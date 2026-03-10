<?php
// ═══════════════════════════════════════════════════════════
// AUTH.PHP — ACF Philippines Authentication Helpers
// ═══════════════════════════════════════════════════════════
// Include this file on any page that needs auth checking.
// All DB queries use PDO parameterized statements.
// ═══════════════════════════════════════════════════════════

require_once __DIR__ . '/db.php';

// Start session securely
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,           // session cookie (expires when browser closes)
        'path'     => '/',
        'secure'   => isset($_SERVER['HTTPS']),  // HTTPS only in production
        'httponly' => true,        // JS cannot read the session cookie
        'samesite' => 'Lax',       // CSRF protection
    ]);
    session_start();
}

// ─────────────────────────────────────────────
// LOGIN — validates credentials, starts session
// Returns: ['success' => bool, 'message' => string]
// ─────────────────────────────────────────────
function acf_login(string $email, string $password): array {
    $db    = get_db();
    $email = trim(strtolower($email));

    // Parameterized query — email value is never interpolated into SQL
    $stmt = $db->prepare('
        SELECT id, full_name, email, password_hash, role, is_active
        FROM   users
        WHERE  email = :email
        LIMIT  1
    ');
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    // Log the attempt (win or lose)
    acf_log_attempt($email, $user['id'] ?? null, false);

    if (!$user) {
        // Mitigate timing attacks: verify a dummy hash
        password_verify($password, '$2y$12$dummyhashtopreventtimingattacks000000000000000000000000');
        return ['success' => false, 'message' => 'Invalid email or password.'];
    }

    if (!$user['is_active']) {
        return ['success' => false, 'message' => 'Your account has been deactivated. Please contact the administrator.'];
    }

    if (!password_verify($password, $user['password_hash'])) {
        return ['success' => false, 'message' => 'Invalid email or password.'];
    }

    // Rehash if the cost factor has been updated
    if (password_needs_rehash($user['password_hash'], PASSWORD_BCRYPT, ['cost' => 12])) {
        $newHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $upd = $db->prepare('UPDATE users SET password_hash = :hash WHERE id = :id');
        $upd->execute([':hash' => $newHash, ':id' => $user['id']]);
    }

    // Record successful login time
    $upd = $db->prepare('UPDATE users SET last_login = NOW() WHERE id = :id');
    $upd->execute([':id' => $user['id']]);

    // Update log to mark success
    acf_log_attempt($email, $user['id'], true, update_last: true);

    // Regenerate session ID to prevent session fixation
    session_regenerate_id(true);

    $_SESSION['acf_user_id']   = $user['id'];
    $_SESSION['acf_user_name'] = $user['full_name'];
    $_SESSION['acf_user_email']= $user['email'];
    $_SESSION['acf_user_role'] = $user['role'];

    return ['success' => true, 'message' => 'Login successful.', 'role' => $user['role']];
}

// ─────────────────────────────────────────────
// REGISTER — creates a new public user account
// Returns: ['success' => bool, 'message' => string]
// ─────────────────────────────────────────────
function acf_register(string $fullName, string $email, string $password): array {
    $db    = get_db();
    $email = trim(strtolower($email));

    // Check if email already exists — parameterized
    $stmt = $db->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        return ['success' => false, 'message' => 'An account with this email already exists.'];
    }

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    // Insert new user — parameterized, role defaults to 'user'
    $ins = $db->prepare('
        INSERT INTO users (full_name, email, password_hash, role)
        VALUES (:name, :email, :hash, \'user\')
    ');
    $ins->execute([
        ':name'  => htmlspecialchars(trim($fullName), ENT_QUOTES, 'UTF-8'),
        ':email' => $email,
        ':hash'  => $hash,
    ]);

    return ['success' => true, 'message' => 'Account created successfully. You can now log in.'];
}

// ─────────────────────────────────────────────
// LOGOUT
// ─────────────────────────────────────────────
function acf_logout(): void {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
    }
    session_destroy();
}

// ─────────────────────────────────────────────
// GUARDS — call at the top of protected pages
// ─────────────────────────────────────────────
function require_login(string $redirect = 'login.php'): void {
    if (empty($_SESSION['acf_user_id'])) {
        header('Location: ' . $redirect . '?next=' . urlencode($_SERVER['REQUEST_URI']));
        exit;
    }
}

function require_admin(string $redirect = 'login.php'): void {
    require_login($redirect);
    if ($_SESSION['acf_user_role'] !== 'admin') {
        http_response_code(403);
        die('<p style="font-family:sans-serif;padding:2rem;">403 — You do not have permission to access this page.</p>');
    }
}

// ─────────────────────────────────────────────
// SESSION HELPERS
// ─────────────────────────────────────────────
function is_logged_in(): bool  { return !empty($_SESSION['acf_user_id']); }
function is_admin(): bool       { return is_logged_in() && $_SESSION['acf_user_role'] === 'admin'; }
function current_user(): array  { return $_SESSION['acf_user_id'] ? [
    'id'    => $_SESSION['acf_user_id'],
    'name'  => $_SESSION['acf_user_name'],
    'email' => $_SESSION['acf_user_email'],
    'role'  => $_SESSION['acf_user_role'],
] : []; }

// ─────────────────────────────────────────────
// INTERNAL — log login attempts for audit trail
// ─────────────────────────────────────────────
function acf_log_attempt(string $email, ?int $userId, bool $success, bool $update_last = false): void {
    try {
        $db = get_db();
        if ($update_last) {
            // Update the most recent failed attempt for this email to mark as success
            $stmt = $db->prepare('
                UPDATE login_log
                SET    success = 1
                WHERE  email_tried = :email
                  AND  success = 0
                ORDER  BY logged_at DESC
                LIMIT  1
            ');
            $stmt->execute([':email' => $email]);
            return;
        }
        $stmt = $db->prepare('
            INSERT INTO login_log (user_id, email_tried, ip_address, user_agent, success)
            VALUES (:uid, :email, :ip, :ua, :ok)
        ');
        $stmt->execute([
            ':uid'   => $userId,
            ':email' => $email,
            ':ip'    => $_SERVER['REMOTE_ADDR'] ?? null,
            ':ua'    => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 300),
            ':ok'    => (int) $success,
        ]);
    } catch (PDOException) {
        // Non-fatal — don't break login if logging fails
    }
}
