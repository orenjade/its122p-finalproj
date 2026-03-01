<?php
// nav-footer.php — ACF Philippines Shared Nav & Footer Include
// Usage: include 'nav-footer.php'; at the top of each page (for nav)
//        and include 'nav-footer.php' with $section='footer' for footer.
// Or use the helper functions below.

function acf_nav($currentPage = '') {
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
      <a class="nav-btn<?= $currentPage === 'home' ? ' active-page' : '' ?>"      href="index.php"     data-page="home">Home</a>
      <a class="nav-btn<?= $currentPage === 'identity' ? ' active-page' : '' ?>"  href="identity.php"  data-page="identity">Our Identity</a>
      <a class="nav-btn<?= $currentPage === 'projects' ? ' active-page' : '' ?>"  href="projects.php"  data-page="projects">Projects &amp; Impact</a>
      <a class="nav-btn<?= $currentPage === 'partners' ? ' active-page' : '' ?>"  href="partners.php"  data-page="partners">Partners &amp; Voices</a>
      <a class="nav-btn<?= $currentPage === 'resources' ? ' active-page' : '' ?>" href="resources.php" data-page="resources">Resources &amp; Contact</a>
      <a class="nav-cta-mobile" href="contact.php" style="display:none;">✉ Reach Us</a>
    </nav>

    <!-- Hamburger (mobile) -->
    <button class="nav-hamburger" id="nav-hamburger" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <!-- Desktop CTA -->
    <a class="nav-cta" href="contact.php">Reach Us</a>

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
