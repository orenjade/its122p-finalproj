<?php
// ═══════════════════════════════════════════════════════════
// DB.PHP — ACF Philippines PDO Database Connection

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'acf_philippines');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

/**
 * Returns a singleton PDO instance.
 * Using PDO with prepared statements for all queries
 * prevents SQL injection at the driver level.
 */
function get_db(): PDO {
    static $pdo = null;

    if ($pdo === null) {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            DB_HOST, DB_NAME, DB_CHARSET
        );

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   // throw on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,          // return assoc arrays
            PDO::ATTR_EMULATE_PREPARES   => false,                     // use real prepared statements
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // Log error — never expose DB details to the browser
            error_log('DB connection failed: ' . $e->getMessage());
            http_response_code(503);
            die(json_encode(['error' => 'Service temporarily unavailable. Please try again later.']));
        }
    }

    return $pdo;
}
