/* ═══════════════════════════════════════════════════════════
   NAV-INIT.JS — ACF Philippines nav init
   Handles: hamburger menu, user dropdown, logo fallback
═══════════════════════════════════════════════════════════ */
(function () {

  /* ── Hamburger menu toggle ── */
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

  /* ── User pill dropdown ── */
  function initUserDropdown() {
    var pill     = document.getElementById('nav-user-pill');
    var dropdown = document.getElementById('nav-user-dropdown');
    if (!pill || !dropdown) return;

    // Always start closed
    dropdown.classList.remove('open');
    pill.classList.remove('open');

    pill.addEventListener('click', function (e) {
      var link = e.target.closest('a');

      // If a dropdown link was clicked, let it navigate — don't toggle
      if (link && dropdown.contains(link)) {
        return; // allow default navigation
      }

      // Otherwise toggle the dropdown open/closed
      e.stopPropagation();
      var isOpen = dropdown.classList.toggle('open');
      pill.classList.toggle('open', isOpen);
    });

    // Close when clicking anywhere outside the pill
    document.addEventListener('click', function (e) {
      if (!pill.contains(e.target)) {
        dropdown.classList.remove('open');
        pill.classList.remove('open');
      }
    });

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        dropdown.classList.remove('open');
        pill.classList.remove('open');
      }
    });
  }

  /* ── Boot on DOM ready ── */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initHamburger();
      initUserDropdown();
    });
  } else {
    initHamburger();
    initUserDropdown();
  }

})();
