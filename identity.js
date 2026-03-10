/* ═══════════════════════════════════════════════════════════
   IDENTITY.JS — ACF Philippines Our Identity Page Scripts
   ═══════════════════════════════════════════════════════════ */

/* ══ SCROLL REVEAL ══════════════════════════════════════════ */
(function () {
  var els = document.querySelectorAll('.reveal');
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) {
        e.target.classList.add('in');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  els.forEach(function (el) { observer.observe(el); });
})();

/* ══ PARALLAX BACKGROUND CIRCLES ═══════════════════════════ */
(function () {
  var speeds  = [0.07, 0.13, 0.05, 0.10, 0.08];
  var xAmps   = [18,   25,   12,   20,   15  ];
  var xFreqs  = [0.0015, 0.0012, 0.002, 0.0018, 0.0025];
  var xPhases = [0,    1.2,  2.5,  0.7,  3.8 ];
  var ticking = false;

  function updateShapes() {
    var shapes  = document.querySelectorAll('#bg-shapes .bg-shape');
    var scrollY = window.scrollY || window.pageYOffset;
    shapes.forEach(function (s, i) {
      var yMove = scrollY * speeds[i];
      var xMove = Math.sin(scrollY * xFreqs[i] + xPhases[i]) * xAmps[i];
      s.style.transform = 'translate(' + xMove + 'px, ' + yMove + 'px)';
    });
    ticking = false;
  }

  window.addEventListener('scroll', function () {
    if (!ticking) {
      window.requestAnimationFrame(updateShapes);
      ticking = true;
    }
  });
})();