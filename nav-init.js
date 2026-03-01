/* ═══════════════════════════════════════════════════════════
   NAV-INIT.JS — ACF Philippines PHP version nav init
   Nav/footer are server-side included, so this script only
   handles the hamburger menu toggle and logo fallback.
═══════════════════════════════════════════════════════════ */
(function () {
  function initHamburger() {
    var hamburger = document.getElementById('nav-hamburger');
    var nav       = document.getElementById('main-nav');
    if (!hamburger || !nav) return;

    hamburger.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('open');
      hamburger.classList.toggle('open', isOpen);
      hamburger.setAttribute('aria-expanded', String(isOpen));
    });

    nav.addEventListener('click', function (e) {
      if (e.target.classList.contains('nav-btn') ||
          e.target.classList.contains('nav-cta-mobile')) {
        nav.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });

    document.addEventListener('click', function (e) {
      if (!nav.contains(e.target) && !hamburger.contains(e.target)) {
        nav.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHamburger);
  } else {
    initHamburger();
  }
})();
