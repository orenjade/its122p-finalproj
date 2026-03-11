<?php
// nav-footer.php — ACF Philippines Shared Nav & Footer Include

// Load auth helpers so we can check session state
require_once __DIR__ . '/auth.php';

function acf_nav($currentPage = '') {
  // Read session state inside the function
  $loggedIn   = is_logged_in();
  $isAdmin    = is_admin();
  $user       = $loggedIn ? current_user() : null;
?>
<!-- ══════════════════════════════════════════════════
     UTILITY BAR
══════════════════════════════════════════════════ -->
<div class="utility-bar">
  <div class="utility-notice">📢 NOTICE: ACF programs now open for new community partners</div>
</div>

<!-- ══════════════════════════════════════════════════
     MAIN HEADER
══════════════════════════════════════════════════ -->
<header class="site-header">
  <div class="header-inner">

    <!-- LOGO -->
    <a class="logo" href="index.php" aria-label="ACF Philippines Home">
      <img
        id="logo-img"
        class="logo-img"
        src="images/logo.jpg"
        alt="Active Citizenship Foundation Philippines"
        onerror="this.style.display='none';document.getElementById('logo-text-fallback').style.display='flex';"
      />
      <div id="logo-text-fallback" class="logo-text-fallback" style="display:none;">
        <div class="logo-acf">
          <span class="l-a">A</span><span class="l-c">C</span><span class="l-f">F</span>
        </div>
        <div class="logo-sub">Active Citizenship Foundation · Philippines</div>
      </div>
    </a>

    <!-- Main nav -->
    <nav class="main-nav" id="main-nav" aria-label="Main navigation">
      <a class="nav-btn<?= $currentPage === 'home'      ? ' active-page' : '' ?>" href="index.php"     data-page="home">Home</a>
      <a class="nav-btn<?= $currentPage === 'identity'  ? ' active-page' : '' ?>" href="identity.php"  data-page="identity">Our Identity</a>
      <a class="nav-btn<?= $currentPage === 'projects'  ? ' active-page' : '' ?>" href="projects.php"  data-page="projects">Projects &amp; Impact</a>
      <a class="nav-btn<?= $currentPage === 'partners'  ? ' active-page' : '' ?>" href="partners.php"  data-page="partners">Partners &amp; Voices</a>
      <a class="nav-btn<?= $currentPage === 'resources' ? ' active-page' : '' ?>" href="resources.php" data-page="resources">Resources &amp; Contact</a>

      <?php if ($loggedIn): ?>
        <!-- ── LOGGED IN: user menu (mobile) ── -->
        <?php if ($isAdmin): ?>
          <a class="nav-btn nav-btn--user" href="admin/dashboard.php">🏠 Dashboard</a>
        <?php endif; ?>
        <a class="nav-cta-mobile nav-cta-mobile--ghost" href="logout.php" style="display:none;">Sign Out</a>
      <?php else: ?>
        <!-- ── LOGGED OUT: login link (mobile) ── -->
        <a class="nav-cta-mobile" href="login.php" style="display:none;">🔐 Sign In / Register</a>
      <?php endif; ?>
    </nav>

    <!-- Hamburger (mobile) -->
    <button class="nav-hamburger" id="nav-hamburger" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <!-- ── RIGHT SIDE: desktop auth area ── -->
    <div class="nav-auth">
      <?php if ($loggedIn): ?>

        <?php if ($isAdmin): ?>
          <!-- Admin: Dashboard link + user pill + logout -->
          <a class="nav-btn nav-btn--user" href="admin/dashboard.php">🏠 Dashboard</a>
        <?php endif; ?>

        <!-- User pill dropdown -->
        <div class="nav-user-pill" id="nav-user-pill">
          <span class="nav-user-avatar"><?= strtoupper(substr($user['name'], 0, 1)) ?></span>
          <span class="nav-user-name"><?= htmlspecialchars(explode(' ', $user['name'])[0]) ?></span>
          <span class="nav-user-arrow">▾</span>

          <div class="nav-user-dropdown" id="nav-user-dropdown">
            <div class="nud-header">
              <div class="nud-name"><?= htmlspecialchars($user['name']) ?></div>
              <div class="nud-email"><?= htmlspecialchars($user['email']) ?></div>
              <div class="nud-role-badge nud-role-badge--<?= $user['role'] ?>">
                <?= $user['role'] === 'admin' ? '⚙ Admin' : '👤 Member' ?>
              </div>
            </div>
            <?php if ($isAdmin): ?>
              <a class="nud-link" href="admin/dashboard.php">🏠 Admin Dashboard</a>
            <?php endif; ?>
            <a class="nud-link nud-link--logout" href="logout.php">↩ Sign Out</a>
          </div>
        </div>

      <?php else: ?>
        <!-- Not logged in: Login button -->
        <a class="nav-cta nav-cta--login" href="login.php">🔐 Sign In</a>
      <?php endif; ?>
    </div>

  </div>
</header>
<?php
}

function acf_footer() {
?>
<!-- ══════════════════════════════════════════════════
     FOOTER
══════════════════════════════════════════════════ -->
<footer class="site-footer">
  <div class="footer-inner">

    <div class="flogo">
      <img class="flogo-img" src="images/logo.jpg" alt="ACF Logo"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
      <div class="flogo-icon" style="display:none;">ACF</div>
      <div>
        <div class="flogo-text">Active Citizenship Foundation</div>
        <div class="fcopy">Philippines · © 2024</div>
      </div>
    </div>

    <div class="footer-contact-inline">
      <span>📍 Unit 3E Suite 122, No. 122 Maginhawa St., 1101 Diliman, QC, Philippines</span>
      <span>✉ <a href="mailto:info@acfphils.org">info@acfphils.org</a></span>
      <span>📞 (+632) 7903 2396</span>
    </div>

    <nav class="flinks" aria-label="Footer navigation">
      <a href="index.php">Home</a>
      <a href="identity.php">Our Identity</a>
      <a href="projects.php">Projects</a>
      <a href="partners.php">Partners</a>
      <a href="resources.php">Resources</a>
    </nav>

  </div>

  <div class="footer-bottom">
    <p>© 2024 Active Citizenship Foundation Philippines. All rights reserved.</p>
    <div class="footer-social-links">
      <a href="https://www.facebook.com/ACFPhilippines" target="_blank" rel="noopener">Facebook</a>
      <a href="https://youtube.com/@activecitizenshipfoundatio9802?si=CL-ZDxyvLbBFAbXl" target="_blank" rel="noopener">YouTube</a>
    </div>
  </div>
</footer>
<?php
}
?>
