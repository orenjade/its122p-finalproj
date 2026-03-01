/* ═══════════════════════════════════════════════════════════
   NAV-LOADER.JS — ACF Philippines Shared Nav & Footer Loader
   ═══════════════════════════════════════════════════════════

   HOW IT WORKS:
   This script fetches nav-footer.html once and injects it into
   every page automatically. It also:
     • Highlights the correct nav link based on the current page
     • Runs the hamburger menu toggle
     • Handles logo image fallback

   HOW TO USE ON ANY NEW PAGE:
   1. Add these two placeholder divs in your HTML:
        <div id="acf-nav"></div>      ← goes right after <body>
        <div id="acf-footer"></div>   ← goes right before </body>
   2. Add this script tag before </body>:
        <script src="nav-loader.js"></script>
   3. That's it. Done.

   ACTIVE NAV LINK:
   The script reads data-page="partners" (etc.) on each <a>
   in the nav and compares to the current HTML filename.
   No manual work needed — it highlights itself automatically.
═══════════════════════════════════════════════════════════ */

(function () {

  /* ── 1. Fetch and inject nav-footer.html ── */
  function loadNavFooter() {
    var navSlot    = document.getElementById('acf-nav');
    var footerSlot = document.getElementById('acf-footer');

    if (!navSlot && !footerSlot) {
      console.warn('ACF Nav Loader: No #acf-nav or #acf-footer placeholder found.');
      return;
    }

    /* Build the correct path to nav-footer.html relative to this script */
    var scriptSrc  = document.currentScript ? document.currentScript.src : '';
    var scriptDir  = scriptSrc.substring(0, scriptSrc.lastIndexOf('/') + 1);
    var htmlPath   = scriptDir + 'nav-footer.html';

    fetch(htmlPath)
      .then(function (res) {
        if (!res.ok) throw new Error('Could not load nav-footer.html — status ' + res.status);
        return res.text();
      })
      .then(function (html) {
        /* Parse the fetched HTML into a temporary document */
        var parser = new DOMParser();
        var doc    = parser.parseFromString(html, 'text/html');

        /* Split: everything before <footer> goes to nav, footer goes to footer */
        var navNodes    = [];
        var footerNode  = null;

        doc.body.childNodes.forEach(function (node) {
          if (node.nodeName === 'FOOTER') {
            footerNode = node;
          } else {
            navNodes.push(node);
          }
        });

        /* Inject nav */
        if (navSlot) {
          navNodes.forEach(function (node) {
            navSlot.appendChild(document.importNode(node, true));
          });
        }

        /* Inject footer */
        if (footerSlot && footerNode) {
          footerSlot.appendChild(document.importNode(footerNode, true));
        }

        /* After injection, run all setup functions */
        setActiveNavLink();
        initHamburger();
        initLogoFallback();
      })
      .catch(function (err) {
        console.error('ACF Nav Loader:', err);
        /* Graceful fallback — page still works, just without shared nav */
      });
  }

  /* ── 2. Highlight the current page's nav link ── */
  function setActiveNavLink() {
    /* Get just the filename, e.g. "partners.html" */
    var path     = window.location.pathname;
    var filename = path.substring(path.lastIndexOf('/') + 1) || 'index.html';

    /* Map filenames to data-page values */
    var pageMap = {
      'index.html'     : 'home',
      ''               : 'home',       /* root / */
      'identity.html'  : 'identity',
      'projects.html'  : 'projects',
      'partners.html'  : 'partners',
      'resources.html' : 'resources',
      'contact.html'   : 'contact'
    };

    var currentPage = pageMap[filename] || filename.replace('.html', '');

    document.querySelectorAll('#acf-nav .nav-btn').forEach(function (link) {
      link.classList.remove('active-page');
      if (link.getAttribute('data-page') === currentPage) {
        link.classList.add('active-page');
      }
    });
  }

  /* ── 3. Hamburger mobile menu toggle ── */
  function initHamburger() {
    var hamburger = document.getElementById('nav-hamburger');
    var nav       = document.getElementById('main-nav');
    if (!hamburger || !nav) return;

    hamburger.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('open');
      hamburger.classList.toggle('open', isOpen);
      hamburger.setAttribute('aria-expanded', String(isOpen));
    });

    /* Close when a nav link is clicked */
    nav.addEventListener('click', function (e) {
      if (e.target.classList.contains('nav-btn') ||
          e.target.classList.contains('nav-cta-mobile')) {
        nav.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });

    /* Close on outside click */
    document.addEventListener('click', function (e) {
      if (!nav.contains(e.target) && !hamburger.contains(e.target)) {
        nav.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ── 4. Logo image error fallback ── */
  function initLogoFallback() {
    var logoImg      = document.getElementById('logo-img');
    var logoFallback = document.getElementById('logo-text-fallback');
    if (logoImg && logoFallback) {
      logoImg.addEventListener('error', function () {
        logoImg.style.display      = 'none';
        logoFallback.style.display = 'flex';
      });
    }

    document.querySelectorAll('.flogo-img').forEach(function (img) {
      img.addEventListener('error', function () {
        img.style.display = 'none';
        var icon = img.nextElementSibling;
        if (icon && icon.classList.contains('flogo-icon')) {
          icon.style.display = 'flex';
        }
      });
    });
  }

  /* ── Boot ── */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', loadNavFooter);
  } else {
    loadNavFooter(); /* DOM already ready */
  }

})();
