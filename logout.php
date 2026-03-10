<?php
// ═══════════════════════════════════════════════════════════
// LOGOUT.PHP — ACF Philippines Logout Handler
// ═══════════════════════════════════════════════════════════
require_once 'auth.php';
acf_logout();
header('Location: index.php?logged_out=1');
exit;
