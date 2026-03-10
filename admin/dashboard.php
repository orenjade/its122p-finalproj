<?php
// ═══════════════════════════════════════════════════════════
// ADMIN/DASHBOARD.PHP — ACF Philippines Admin Dashboard
// ═══════════════════════════════════════════════════════════
require_once '../auth.php';
require_once '../nav-footer.php';
require_admin('../login.php');   // ← blocks non-admins

$db   = get_db();
$user = current_user();

// ── Stats (all parameterized / no user input here, but good practice) ──
$stats = [];

$stmt = $db->query('SELECT COUNT(*) FROM users WHERE role = \'user\'');
$stats['public_users'] = (int) $stmt->fetchColumn();

$stmt = $db->query('SELECT COUNT(*) FROM news_articles WHERE status = \'published\'');
$stats['published_articles'] = (int) $stmt->fetchColumn();

$stmt = $db->query('SELECT COUNT(*) FROM partners WHERE is_active = 1');
$stats['active_partners'] = (int) $stmt->fetchColumn();

$stmt = $db->query('SELECT COUNT(*) FROM team_members WHERE is_active = 1');
$stats['team_members'] = (int) $stmt->fetchColumn();

// ── Recent login attempts ─────────────────────────────────
$stmt = $db->prepare('
    SELECT l.email_tried, l.ip_address, l.success, l.logged_at, u.full_name
    FROM   login_log l
    LEFT JOIN users u ON u.id = l.user_id
    ORDER  BY l.logged_at DESC
    LIMIT  10
');
$stmt->execute();
$recent_logins = $stmt->fetchAll();

// ── Latest news ───────────────────────────────────────────
$stmt = $db->prepare('
    SELECT a.id, a.title, a.tag, a.status, a.published_at, u.full_name AS author
    FROM   news_articles a
    JOIN   users u ON u.id = a.author_id
    ORDER  BY a.created_at DESC
    LIMIT  6
');
$stmt->execute();
$recent_articles = $stmt->fetchAll();

// ── Team members ──────────────────────────────────────────
$stmt = $db->prepare('
    SELECT id, full_name, role_title, badge_color, is_featured, is_active, sort_order
    FROM   team_members
    ORDER  BY sort_order ASC
');
$stmt->execute();
$team = $stmt->fetchAll();

// ── Partners ──────────────────────────────────────────────
$stmt = $db->prepare('
    SELECT id, partner_name, partner_type, is_active, sort_order
    FROM   partners
    ORDER  BY sort_order ASC
');
$stmt->execute();
$partners = $stmt->fetchAll();

// ── Handle quick actions (POST) ───────────────────────────
$flash = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {

    // Toggle article status
    if ($_POST['action'] === 'toggle_article_status' && !empty($_POST['article_id'])) {
        $stmt = $db->prepare('
            UPDATE news_articles
            SET status = CASE WHEN status = \'published\' THEN \'draft\' ELSE \'published\' END,
                published_at = CASE WHEN status = \'draft\' THEN NOW() ELSE published_at END
            WHERE id = :id
        ');
        $stmt->execute([':id' => (int) $_POST['article_id']]);
        $flash = 'Article status updated.';
    }

    // Toggle partner active
    if ($_POST['action'] === 'toggle_partner' && !empty($_POST['partner_id'])) {
        $stmt = $db->prepare('UPDATE partners SET is_active = 1 - is_active WHERE id = :id');
        $stmt->execute([':id' => (int) $_POST['partner_id']]);
        $flash = 'Partner updated.';
    }

    // Toggle team member active
    if ($_POST['action'] === 'toggle_team' && !empty($_POST['member_id'])) {
        $stmt = $db->prepare('UPDATE team_members SET is_active = 1 - is_active WHERE id = :id');
        $stmt->execute([':id' => (int) $_POST['member_id']]);
        $flash = 'Team member updated.';
    }

    // Refresh page after action
    header('Location: dashboard.php?flash=' . urlencode($flash));
    exit;
}

if (isset($_GET['flash'])) {
    $flash = htmlspecialchars($_GET['flash']);
}

$currentPage = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard — ACF Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="../styles.css"/>
  <link rel="stylesheet" href="../nav-footer.css"/>

  <style>
    /* ── ADMIN LAYOUT ── */
    .admin-layout {
      display: grid;
      grid-template-columns: 240px 1fr;
      min-height: calc(100vh - 80px);
      background: #f3f1fb;
    }

    /* Sidebar */
    .admin-sidebar {
      background: #1E1660;
      padding: 2rem 0 2rem;
      display: flex;
      flex-direction: column;
      gap: 0.2rem;
      position: sticky;
      top: 80px;
      height: calc(100vh - 80px);
      overflow-y: auto;
    }
    .sidebar-label {
      font-size: 0.68rem;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 0.14em;
      color: rgba(255,255,255,0.3);
      padding: 1.2rem 1.5rem 0.4rem;
    }
    .sidebar-link {
      display: flex;
      align-items: center;
      gap: 0.65rem;
      padding: 0.65rem 1.5rem;
      font-family: var(--font-body);
      font-weight: 800;
      font-size: 0.9rem;
      color: rgba(255,255,255,0.62);
      border-left: 3px solid transparent;
      transition: color .18s, background .18s, border-color .18s;
      text-decoration: none;
    }
    .sidebar-link:hover, .sidebar-link.active {
      color: #fff;
      background: rgba(255,255,255,0.07);
      border-left-color: var(--orange);
    }
    .sidebar-icon { font-size: 1.05rem; width: 20px; text-align: center; }
    .sidebar-logout {
      margin-top: auto;
      padding: 1.5rem 1.5rem 0;
    }
    .sidebar-logout a {
      display: block;
      background: rgba(232,99,10,0.18);
      border: 1.5px solid rgba(232,99,10,0.3);
      color: var(--orange-lt);
      text-align: center;
      padding: 0.6rem 1rem;
      border-radius: 10px;
      font-weight: 800;
      font-size: 0.88rem;
      transition: background .18s;
      text-decoration: none;
    }
    .sidebar-logout a:hover { background: var(--orange); color: #fff; }

    /* Main content */
    .admin-main {
      padding: 2.5rem 2rem 3rem;
      overflow-x: hidden;
    }

    /* Page header */
    .admin-page-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .admin-page-title {
      font-family: var(--font-head);
      font-size: 2rem;
      color: var(--navy);
      line-height: 1.1;
    }
    .admin-page-title span { color: var(--orange); }
    .admin-welcome {
      font-size: 0.92rem;
      color: var(--gray);
      margin-top: 0.2rem;
    }

    /* Flash */
    .admin-flash {
      background: #edfaf7;
      border: 1.5px solid #b0e8d8;
      color: #0a7a5a;
      border-radius: 10px;
      padding: 0.7rem 1rem;
      font-weight: 700;
      font-size: 0.88rem;
      margin-bottom: 1.5rem;
    }

    /* Stat cards */
    .admin-stats {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .admin-stat-card {
      background: #fff;
      border-radius: 18px;
      padding: 1.4rem 1.5rem;
      box-shadow: 0 2px 10px rgba(30,22,96,0.07);
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .asc-icon {
      width: 48px; height: 48px;
      border-radius: 13px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.5rem;
      flex-shrink: 0;
    }
    .asc-icon--orange { background: rgba(232,99,10,0.12); }
    .asc-icon--navy   { background: rgba(30,22,96,0.10); }
    .asc-icon--teal   { background: rgba(14,158,142,0.12); }
    .asc-icon--blue   { background: rgba(46,123,191,0.12); }
    .asc-num {
      font-family: var(--font-head);
      font-size: 1.9rem;
      color: var(--navy);
      line-height: 1;
    }
    .asc-label {
      font-size: 0.74rem;
      font-weight: 800;
      color: var(--gray);
      text-transform: uppercase;
      letter-spacing: 0.07em;
    }

    /* Section heading */
    .admin-section-title {
      font-family: var(--font-head);
      font-size: 1.2rem;
      color: var(--navy);
      margin-bottom: 0.75rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    /* Tables */
    .admin-table-wrap {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 10px rgba(30,22,96,0.06);
      overflow: hidden;
      margin-bottom: 2rem;
    }
    .admin-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.88rem;
    }
    .admin-table th {
      background: #f8f7fc;
      font-size: 0.72rem;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 0.09em;
      color: var(--gray);
      padding: 0.8rem 1.1rem;
      text-align: left;
      border-bottom: 1.5px solid #e8e4f0;
    }
    .admin-table td {
      padding: 0.8rem 1.1rem;
      border-bottom: 1px solid #f0edf8;
      color: var(--text);
      vertical-align: middle;
    }
    .admin-table tr:last-child td { border-bottom: none; }
    .admin-table tr:hover td { background: #faf9fd; }

    /* Badges */
    .badge {
      display: inline-block;
      font-size: 0.68rem;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      padding: 0.22rem 0.65rem;
      border-radius: 100px;
    }
    .badge-green  { background: #edfaf7; color: #0a7a5a; }
    .badge-gray   { background: #f0edf8; color: #8880a8; }
    .badge-orange { background: rgba(232,99,10,0.12); color: var(--orange); }
    .badge-blue   { background: rgba(46,123,191,0.12); color: #2E7BBF; }
    .badge-teal   { background: rgba(14,158,142,0.12); color: #0E9E8E; }

    /* Action button in table */
    .tbl-btn {
      font-size: 0.75rem;
      font-weight: 800;
      border: 1.5px solid currentColor;
      border-radius: 7px;
      padding: 0.25rem 0.7rem;
      background: none;
      cursor: pointer;
      transition: background .18s, color .18s;
    }
    .tbl-btn-orange { color: var(--orange); }
    .tbl-btn-orange:hover { background: var(--orange); color: #fff; }
    .tbl-btn-gray   { color: #8880a8; }
    .tbl-btn-gray:hover   { background: #8880a8; color: #fff; }

    /* Two-column grid for bottom sections */
    .admin-grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5rem;
    }

    @media (max-width: 1100px) {
      .admin-stats { grid-template-columns: repeat(2, 1fr); }
      .admin-grid-2 { grid-template-columns: 1fr; }
    }
    @media (max-width: 820px) {
      .admin-layout { grid-template-columns: 1fr; }
      .admin-sidebar {
        position: static;
        height: auto;
        flex-direction: row;
        flex-wrap: wrap;
        padding: 0.75rem 1rem;
        gap: 0;
      }
      .sidebar-label { display: none; }
      .sidebar-link { padding: 0.5rem 0.75rem; border-left: none; border-bottom: 3px solid transparent; font-size: 0.8rem; }
      .sidebar-link:hover, .sidebar-link.active { border-left-color: transparent; border-bottom-color: var(--orange); }
      .sidebar-logout { padding: 0; margin: 0; }
      .admin-stats { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 480px) {
      .admin-stats { grid-template-columns: 1fr 1fr; }
      .admin-main { padding: 1.5rem 1rem 2rem; }
    }
  </style>
</head>
<body>

  <?php acf_nav($currentPage); ?>

  <div class="admin-layout">

    <!-- ── SIDEBAR ── -->
    <aside class="admin-sidebar">
      <div class="sidebar-label">Overview</div>
      <a href="dashboard.php" class="sidebar-link active">
        <span class="sidebar-icon">🏠</span> Dashboard
      </a>

      <div class="sidebar-label">Content</div>
      <a href="#section-news" class="sidebar-link">
        <span class="sidebar-icon">📰</span> News &amp; Articles
      </a>
      <a href="#section-partners" class="sidebar-link">
        <span class="sidebar-icon">🤝</span> Partners
      </a>
      <a href="#section-team" class="sidebar-link">
        <span class="sidebar-icon">👥</span> Team Members
      </a>

      <div class="sidebar-label">System</div>
      <a href="#section-logins" class="sidebar-link">
        <span class="sidebar-icon">🔐</span> Login Activity
      </a>

      <div class="sidebar-logout">
        <a href="../logout.php">Sign Out ↩</a>
      </div>
    </aside>

    <!-- ── MAIN CONTENT ── -->
    <main class="admin-main">

      <!-- Page header -->
      <div class="admin-page-header">
        <div>
          <h1 class="admin-page-title">Admin <span>Dashboard</span></h1>
          <p class="admin-welcome">Welcome back, <?= htmlspecialchars($user['name']) ?>. Here's your site overview.</p>
        </div>
        <a href="../index.php" class="chip chip-n" style="text-decoration:none;">← View Site</a>
      </div>

      <?php if ($flash): ?>
        <div class="admin-flash">✔ <?= $flash ?></div>
      <?php endif; ?>

      <!-- ── STATS ── -->
      <div class="admin-stats">
        <div class="admin-stat-card">
          <div class="asc-icon asc-icon--orange">👥</div>
          <div><div class="asc-num"><?= $stats['public_users'] ?></div><div class="asc-label">Registered Users</div></div>
        </div>
        <div class="admin-stat-card">
          <div class="asc-icon asc-icon--navy">📰</div>
          <div><div class="asc-num"><?= $stats['published_articles'] ?></div><div class="asc-label">Published Articles</div></div>
        </div>
        <div class="admin-stat-card">
          <div class="asc-icon asc-icon--teal">🤝</div>
          <div><div class="asc-num"><?= $stats['active_partners'] ?></div><div class="asc-label">Active Partners</div></div>
        </div>
        <div class="admin-stat-card">
          <div class="asc-icon asc-icon--blue">🏛</div>
          <div><div class="asc-num"><?= $stats['team_members'] ?></div><div class="asc-label">Team Members</div></div>
        </div>
      </div>

      <!-- ── NEWS ARTICLES ── -->
      <h2 class="admin-section-title" id="section-news">📰 News &amp; Articles</h2>
      <div class="admin-table-wrap">
        <table class="admin-table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Tag</th>
              <th>Author</th>
              <th>Status</th>
              <th>Published</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($recent_articles as $art): ?>
            <tr>
              <td style="max-width:260px;font-weight:700;"><?= htmlspecialchars($art['title']) ?></td>
              <td><span class="badge badge-blue"><?= htmlspecialchars($art['tag'] ?? '—') ?></span></td>
              <td><?= htmlspecialchars($art['author']) ?></td>
              <td>
                <span class="badge <?= $art['status'] === 'published' ? 'badge-green' : 'badge-gray' ?>">
                  <?= $art['status'] ?>
                </span>
              </td>
              <td style="white-space:nowrap;color:var(--gray);font-size:0.82rem;">
                <?= $art['published_at'] ? date('M j, Y', strtotime($art['published_at'])) : '—' ?>
              </td>
              <td>
                <form method="POST" style="display:inline;">
                  <input type="hidden" name="action" value="toggle_article_status"/>
                  <input type="hidden" name="article_id" value="<?= (int) $art['id'] ?>"/>
                  <button type="submit" class="tbl-btn tbl-btn-orange">
                    <?= $art['status'] === 'published' ? 'Unpublish' : 'Publish' ?>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- ── PARTNERS + TEAM ── -->
      <div class="admin-grid-2">

        <!-- Partners -->
        <div>
          <h2 class="admin-section-title" id="section-partners">🤝 Partners</h2>
          <div class="admin-table-wrap">
            <table class="admin-table">
              <thead><tr><th>Partner</th><th>Type</th><th>Status</th><th>Action</th></tr></thead>
              <tbody>
              <?php foreach ($partners as $p): ?>
                <tr>
                  <td style="font-weight:700;"><?= htmlspecialchars($p['partner_name']) ?></td>
                  <td style="font-size:0.8rem;color:var(--gray);"><?= htmlspecialchars($p['partner_type']) ?></td>
                  <td>
                    <span class="badge <?= $p['is_active'] ? 'badge-green' : 'badge-gray' ?>">
                      <?= $p['is_active'] ? 'Active' : 'Hidden' ?>
                    </span>
                  </td>
                  <td>
                    <form method="POST" style="display:inline;">
                      <input type="hidden" name="action" value="toggle_partner"/>
                      <input type="hidden" name="partner_id" value="<?= (int) $p['id'] ?>"/>
                      <button type="submit" class="tbl-btn tbl-btn-gray">
                        <?= $p['is_active'] ? 'Hide' : 'Show' ?>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Team -->
        <div>
          <h2 class="admin-section-title" id="section-team">👥 Team Members</h2>
          <div class="admin-table-wrap">
            <table class="admin-table">
              <thead><tr><th>Name</th><th>Role</th><th>Status</th><th>Action</th></tr></thead>
              <tbody>
              <?php foreach ($team as $m): ?>
                <tr>
                  <td style="font-weight:700;">
                    <?= htmlspecialchars($m['full_name']) ?>
                    <?php if ($m['is_featured']): ?><span class="badge badge-orange" style="margin-left:.3rem;">★</span><?php endif; ?>
                  </td>
                  <td style="font-size:0.8rem;color:var(--gray);"><?= htmlspecialchars($m['role_title']) ?></td>
                  <td>
                    <span class="badge <?= $m['is_active'] ? 'badge-green' : 'badge-gray' ?>">
                      <?= $m['is_active'] ? 'Active' : 'Hidden' ?>
                    </span>
                  </td>
                  <td>
                    <form method="POST" style="display:inline;">
                      <input type="hidden" name="action" value="toggle_team"/>
                      <input type="hidden" name="member_id" value="<?= (int) $m['id'] ?>"/>
                      <button type="submit" class="tbl-btn tbl-btn-gray">
                        <?= $m['is_active'] ? 'Hide' : 'Show' ?>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- ── LOGIN ACTIVITY ── -->
      <h2 class="admin-section-title" id="section-logins">🔐 Recent Login Activity</h2>
      <div class="admin-table-wrap">
        <table class="admin-table">
          <thead>
            <tr>
              <th>Email</th>
              <th>Name</th>
              <th>IP Address</th>
              <th>Result</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($recent_logins as $log): ?>
            <tr>
              <td><?= htmlspecialchars($log['email_tried']) ?></td>
              <td style="color:var(--gray);"><?= htmlspecialchars($log['full_name'] ?? '—') ?></td>
              <td style="font-family:monospace;font-size:0.82rem;"><?= htmlspecialchars($log['ip_address'] ?? '—') ?></td>
              <td>
                <span class="badge <?= $log['success'] ? 'badge-green' : 'badge-gray' ?>">
                  <?= $log['success'] ? 'Success' : 'Failed' ?>
                </span>
              </td>
              <td style="white-space:nowrap;color:var(--gray);font-size:0.82rem;">
                <?= date('M j, Y g:ia', strtotime($log['logged_at'])) ?>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php if (empty($recent_logins)): ?>
            <tr><td colspan="5" style="text-align:center;color:var(--gray);padding:1.5rem;">No login activity yet.</td></tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

    </main><!-- /admin-main -->
  </div><!-- /admin-layout -->

  <!-- Wave → footer -->
  <div class="wave" style="background:#f3f1fb;">
    <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,48 C360,0 1080,72 1440,28 L1440,72 L0,72 Z" fill="#0F0C28"/>
    </svg>
  </div>

  <?php acf_footer(); ?>
  <script src="../nav-init.js"></script>
</body>
</html>
