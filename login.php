<?php
// ═══════════════════════════════════════════════════════════
// LOGIN.PHP — ACF Philippines Login / Register Page
// ═══════════════════════════════════════════════════════════
require_once 'auth.php';
require_once 'nav-footer.php';

// Redirect if already logged in
if (is_logged_in()) {
    header('Location: ' . (is_admin() ? 'admin/dashboard.php' : 'index.php'));
    exit;
}

$mode    = $_GET['mode'] ?? 'login';   // 'login' | 'register'
$error   = '';
$success = '';
$next    = htmlspecialchars($_GET['next'] ?? '', ENT_QUOTES, 'UTF-8');

// ── Handle POST ──────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        $email    = $_POST['email']    ?? '';
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            $error = 'Please fill in all fields.';
        } else {
            $result = acf_login($email, $password);
            if ($result['success']) {
                $dest = $next ?: ($result['role'] === 'admin' ? 'admin/dashboard.php' : 'index.php');
                header('Location: ' . $dest);
                exit;
            } else {
                $error = $result['message'];
            }
        }
        $mode = 'login';

    } elseif ($action === 'register') {
        $fullName  = trim($_POST['full_name'] ?? '');
        $email     = trim($_POST['email']     ?? '');
        $password  = $_POST['password']       ?? '';
        $password2 = $_POST['password2']      ?? '';

        if (!$fullName || !$email || !$password || !$password2) {
            $error = 'Please fill in all fields.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Please enter a valid email address.';
        } elseif (strlen($password) < 8) {
            $error = 'Password must be at least 8 characters.';
        } elseif ($password !== $password2) {
            $error = 'Passwords do not match.';
        } else {
            $result = acf_register($fullName, $email, $password);
            if ($result['success']) {
                $success = $result['message'];
                $mode    = 'login';
            } else {
                $error = $result['message'];
            }
        }
        if (!$success) $mode = 'register';
    }
}

$currentPage = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $mode === 'register' ? 'Create Account' : 'Sign In' ?> — ACF Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>

  <style>
    /* ── LOGIN PAGE STYLES ── */
    .login-page {
      min-height: calc(100vh - 80px);
      background: #f3f1fb;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 4rem 1.25rem;
      position: relative;
      overflow: hidden;
    }

    /* Decorative background blobs */
    .login-blob {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
      z-index: 0;
    }
    .login-blob-1 {
      width: 480px; height: 480px;
      background: radial-gradient(circle, rgba(232,99,10,.13), transparent 70%);
      top: -140px; right: -100px;
    }
    .login-blob-2 {
      width: 360px; height: 360px;
      background: radial-gradient(circle, rgba(30,22,96,.10), transparent 70%);
      bottom: -80px; left: -60px;
    }
    .login-blob-3 {
      width: 220px; height: 220px;
      background: radial-gradient(circle, rgba(14,158,142,.09), transparent 70%);
      top: 45%; left: 55%;
    }

    /* Card */
    .login-card {
      background: #ffffff;
      border-radius: 28px;
      box-shadow: 0 8px 40px rgba(30,22,96,0.12), 0 2px 8px rgba(30,22,96,0.06);
      width: 100%;
      max-width: 460px;
      padding: 2.8rem 2.6rem 2.4rem;
      position: relative;
      z-index: 1;
    }

    /* Header */
    .login-brand {
      display: flex;
      align-items: center;
      gap: 0.7rem;
      margin-bottom: 1.8rem;
    }
    .login-brand-dot {
      width: 10px; height: 10px;
      background: var(--orange);
      border-radius: 50%;
      flex-shrink: 0;
    }
    .login-brand-name {
      font-family: var(--font-head);
      font-size: 1.05rem;
      color: var(--navy);
      line-height: 1;
    }
    .login-title {
      font-family: var(--font-head);
      font-size: clamp(1.6rem, 4vw, 2.2rem);
      color: var(--navy);
      line-height: 1.1;
      margin-bottom: 0.4rem;
    }
    .login-title em { font-style: normal; color: var(--orange); }
    .login-subtitle {
      font-size: 0.92rem;
      color: var(--gray);
      margin-bottom: 2rem;
      line-height: 1.55;
    }

    /* Tab switcher */
    .login-tabs {
      display: grid;
      grid-template-columns: 1fr 1fr;
      background: #f3f1fb;
      border-radius: 12px;
      padding: 4px;
      margin-bottom: 1.8rem;
      gap: 4px;
    }
    .login-tab {
      font-family: var(--font-body);
      font-weight: 800;
      font-size: 0.88rem;
      text-align: center;
      padding: 0.6rem 1rem;
      border-radius: 9px;
      border: none;
      cursor: pointer;
      transition: background .2s, color .2s, box-shadow .2s;
      text-decoration: none;
      color: var(--gray);
      background: transparent;
    }
    .login-tab.active {
      background: #fff;
      color: var(--navy);
      box-shadow: 0 2px 8px rgba(30,22,96,0.1);
    }

    /* Form */
    .login-form { display: flex; flex-direction: column; gap: 1.1rem; }

    .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
    .form-label {
      font-size: 0.82rem;
      font-weight: 800;
      color: var(--navy);
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }
    .form-input {
      font-family: var(--font-body);
      font-size: 0.97rem;
      font-weight: 600;
      color: var(--text);
      background: #f8f7fc;
      border: 1.5px solid #e2dff0;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      outline: none;
      transition: border-color .18s, box-shadow .18s;
      width: 100%;
      box-sizing: border-box;
    }
    .form-input:focus {
      border-color: var(--orange);
      box-shadow: 0 0 0 3px rgba(232,99,10,0.12);
      background: #fff;
    }
    .form-input::placeholder { color: #b0aac0; font-weight: 600; }

    /* Password wrapper with show/hide toggle */
    .input-wrap { position: relative; }
    .input-wrap .form-input { padding-right: 2.8rem; }
    .toggle-pw {
      position: absolute;
      right: 0.8rem;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: #a09ab8;
      font-size: 1.1rem;
      line-height: 1;
      padding: 0.2rem;
      transition: color .18s;
    }
    .toggle-pw:hover { color: var(--navy); }

    /* Alerts */
    .login-alert {
      border-radius: 10px;
      padding: 0.75rem 1rem;
      font-size: 0.88rem;
      font-weight: 700;
      display: flex;
      align-items: flex-start;
      gap: 0.5rem;
    }
    .login-alert--error {
      background: #fff0ec;
      color: #c0390a;
      border: 1.5px solid #ffd0c0;
    }
    .login-alert--success {
      background: #edfaf7;
      color: #0a7a5a;
      border: 1.5px solid #b0e8d8;
    }

    /* Submit button */
    .btn-login {
      background: var(--orange);
      color: #fff;
      font-family: var(--font-body);
      font-weight: 900;
      font-size: 1rem;
      padding: 0.85rem 1.5rem;
      border-radius: 12px;
      border: none;
      cursor: pointer;
      box-shadow: 0 4px 0 #b84d08;
      transition: background .18s, transform .12s, box-shadow .12s;
      width: 100%;
      margin-top: 0.4rem;
    }
    .btn-login:hover   { background: #c9540a; transform: translateY(2px); box-shadow: 0 2px 0 #b84d08; }
    .btn-login:active  { transform: translateY(4px); box-shadow: none; }

    /* Footer note */
    .login-footer-note {
      text-align: center;
      font-size: 0.8rem;
      color: #a09ab8;
      margin-top: 1.4rem;
    }
    .login-footer-note a { color: var(--orange); font-weight: 800; }
    .login-footer-note a:hover { text-decoration: underline; }

    /* Divider */
    .login-divider {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin: 0.5rem 0;
      color: #c5c0d8;
      font-size: 0.78rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }
    .login-divider::before,
    .login-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #e8e4f0;
    }

    @media (max-width: 480px) {
      .login-card { padding: 2rem 1.5rem 2rem; }
    }
  </style>
</head>
<body>

  <?php acf_nav($currentPage); ?>

  <div class="login-page">
    <!-- Decorative blobs -->
    <span class="login-blob login-blob-1" aria-hidden="true"></span>
    <span class="login-blob login-blob-2" aria-hidden="true"></span>
    <span class="login-blob login-blob-3" aria-hidden="true"></span>

    <div class="login-card">

      <!-- Brand identifier -->
      <div class="login-brand">
        <span class="login-brand-dot"></span>
        <span class="login-brand-name">Active Citizenship Foundation Philippines</span>
      </div>

      <!-- Title -->
      <h1 class="login-title">
        <?= $mode === 'register' ? 'Create <em>Account</em>' : 'Welcome <em>Back</em>' ?>
      </h1>
      <p class="login-subtitle">
        <?= $mode === 'register'
          ? 'Join the ACF community and stay updated on our programs and advocacy work.'
          : 'Sign in to access your ACF Philippines account.' ?>
      </p>

      <!-- Tab switch -->
      <div class="login-tabs" role="tablist">
        <a href="login.php?mode=login<?= $next ? '&next='.urlencode($_GET['next'] ?? '') : '' ?>"
           class="login-tab <?= $mode !== 'register' ? 'active' : '' ?>"
           role="tab" aria-selected="<?= $mode !== 'register' ? 'true' : 'false' ?>">Sign In</a>
        <a href="login.php?mode=register"
           class="login-tab <?= $mode === 'register' ? 'active' : '' ?>"
           role="tab" aria-selected="<?= $mode === 'register' ? 'true' : 'false' ?>">Create Account</a>
      </div>

      <!-- Alerts -->
      <?php if ($error): ?>
        <div class="login-alert login-alert--error" role="alert">⚠ <?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <?php if ($success): ?>
        <div class="login-alert login-alert--success" role="alert">✔ <?= htmlspecialchars($success) ?></div>
      <?php endif; ?>

      <!-- ── LOGIN FORM ── -->
      <?php if ($mode !== 'register'): ?>
      <form class="login-form" method="POST" action="login.php<?= $next ? '?next='.urlencode($_GET['next'] ?? '') : '' ?>" novalidate>
        <input type="hidden" name="action" value="login"/>

        <div class="form-group">
          <label class="form-label" for="login-email">Email Address</label>
          <input class="form-input" type="email" id="login-email" name="email"
                 placeholder="you@example.com"
                 value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                 autocomplete="email" required/>
        </div>

        <div class="form-group">
          <label class="form-label" for="login-password">Password</label>
          <div class="input-wrap">
            <input class="form-input" type="password" id="login-password" name="password"
                   placeholder="••••••••" autocomplete="current-password" required/>
            <button type="button" class="toggle-pw" aria-label="Toggle password visibility"
                    onclick="togglePw('login-password', this)">👁</button>
          </div>
        </div>

        <button type="submit" class="btn-login">Sign In →</button>
      </form>

      <!-- ── REGISTER FORM ── -->
      <?php else: ?>
      <form class="login-form" method="POST" action="login.php?mode=register" novalidate>
        <input type="hidden" name="action" value="register"/>

        <div class="form-group">
          <label class="form-label" for="reg-name">Full Name</label>
          <input class="form-input" type="text" id="reg-name" name="full_name"
                 placeholder="Juan dela Cruz"
                 value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>"
                 autocomplete="name" required/>
        </div>

        <div class="form-group">
          <label class="form-label" for="reg-email">Email Address</label>
          <input class="form-input" type="email" id="reg-email" name="email"
                 placeholder="you@example.com"
                 value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                 autocomplete="email" required/>
        </div>

        <div class="form-group">
          <label class="form-label" for="reg-password">Password <span style="color:#a09ab8;font-weight:600;">(min. 8 characters)</span></label>
          <div class="input-wrap">
            <input class="form-input" type="password" id="reg-password" name="password"
                   placeholder="••••••••" autocomplete="new-password" required minlength="8"/>
            <button type="button" class="toggle-pw" aria-label="Toggle password visibility"
                    onclick="togglePw('reg-password', this)">👁</button>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="reg-password2">Confirm Password</label>
          <div class="input-wrap">
            <input class="form-input" type="password" id="reg-password2" name="password2"
                   placeholder="••••••••" autocomplete="new-password" required/>
            <button type="button" class="toggle-pw" aria-label="Toggle password visibility"
                    onclick="togglePw('reg-password2', this)">👁</button>
          </div>
        </div>

        <button type="submit" class="btn-login">Create Account →</button>
      </form>
      <?php endif; ?>

      <p class="login-footer-note">
        <?= $mode === 'register'
          ? 'Already have an account? <a href="login.php?mode=login">Sign in</a>'
          : 'No account yet? <a href="login.php?mode=register">Create one — it\'s free</a>' ?>
      </p>

    </div><!-- /login-card -->
  </div><!-- /login-page -->

  <!-- Wave → footer -->
  <div class="wave" style="background:#f3f1fb;">
    <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,48 C360,0 1080,72 1440,28 L1440,72 L0,72 Z" fill="#0F0C28"/>
    </svg>
  </div>

  <?php acf_footer(); ?>

  <script src="nav-init.js"></script>
  <script>
    function togglePw(inputId, btn) {
      var inp = document.getElementById(inputId);
      if (!inp) return;
      inp.type = inp.type === 'password' ? 'text' : 'password';
      btn.textContent = inp.type === 'password' ? '👁' : '🙈';
    }
  </script>
</body>
</html>
