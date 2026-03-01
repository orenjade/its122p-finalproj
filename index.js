/* ═══════════════════════════════════════════════════════════
   INDEX.JS — ACF Philippines Home Page Scripts (PHP version)
   SPA routing removed — pages are now separate PHP files.
   Scroll reveal, parallax, and hero curve animation retained.
═══════════════════════════════════════════════════════════ */

/* ══ 1. SCROLL REVEAL ════════════════════════════════════════ */
function initReveals() {
  var els = document.querySelectorAll('.reveal');
  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(e) {
      if (e.isIntersecting) {
        e.target.classList.add('in');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  els.forEach(function(el) { observer.observe(el); });
}

/* ══ 2. CURVED SVG HERO SCROLL ANIMATION ════════════════════ */
(function() {
  var defaultCurveValue = 120;
  var curveRate         = 3;
  var ticking           = false;

  function scrollEvent(scrollPos) {
    var $curve = document.getElementById('hero-curve-path');
    if (!$curve) return;
    if (scrollPos >= 0 && scrollPos < defaultCurveValue * curveRate) {
      var curveValue = defaultCurveValue - (scrollPos / curveRate);
      $curve.setAttribute('d',
        'M 800 80 Q 400 ' + curveValue + ' 0 80 L 0 120 L 800 120 Z'
      );
    }
  }

  window.addEventListener('scroll', function() {
    var pos = window.scrollY;
    if (!ticking) {
      window.requestAnimationFrame(function() {
        scrollEvent(pos);
        ticking = false;
      });
      ticking = true;
    }
  });
})();

/* ══ 3. PARALLAX BACKGROUND CIRCLES ════════════════════════ */
(function() {
  var bgDiv = document.createElement('div');
  bgDiv.id = 'bg-shapes';
  bgDiv.setAttribute('aria-hidden', 'true');
  bgDiv.style.cssText = 'position:fixed;inset:0;pointer-events:none;z-index:0;overflow:hidden;';

  var circleData = [
    { w: 380, h: 380, top: '5%',  left: '-8%',  color: 'rgba(232,99,10,.07)'  },
    { w: 520, h: 520, top: '28%', right: '-10%', color: 'rgba(46,123,191,.06)' },
    { w: 260, h: 260, top: '55%', left: '8%',   color: 'rgba(155,89,182,.06)' },
    { w: 440, h: 440, top: '72%', right: '4%',   color: 'rgba(14,158,142,.05)'  },
    { w: 200, h: 200, top: '42%', left: '44%',  color: 'rgba(232,146,74,.07)'  }
  ];

  circleData.forEach(function(c) {
    var el = document.createElement('div');
    el.className = 'bg-shape';
    var pos = c.right
      ? 'right:' + c.right + ';top:' + c.top + ';'
      : 'left:' + c.left + ';top:' + c.top + ';';
    el.style.cssText = [
      'width:'  + c.w + 'px',
      'height:' + c.h + 'px',
      pos,
      'background:radial-gradient(circle,' + c.color + ',transparent 70%)',
      'border-radius:50%',
      'position:absolute',
      'will-change:transform'
    ].join(';');
    bgDiv.appendChild(el);
  });

  document.body.insertBefore(bgDiv, document.body.firstChild);

  var shapes  = bgDiv.querySelectorAll('.bg-shape');
  var speeds  = [0.07, 0.13, 0.05, 0.10, 0.08];
  var xAmps   = [18,   25,   12,   20,   15  ];
  var xFreqs  = [0.0015, 0.0012, 0.002, 0.0018, 0.0025];
  var xPhases = [0,    1.2,  2.5,  0.7,  3.8 ];
  var ticking = false;

  function updateShapes() {
    var scrollY = window.scrollY || window.pageYOffset;
    shapes.forEach(function(s, i) {
      var yMove = scrollY * speeds[i];
      var xMove = Math.sin(scrollY * xFreqs[i] + xPhases[i]) * xAmps[i];
      s.style.transform = 'translate(' + xMove + 'px, ' + yMove + 'px)';
    });
    ticking = false;
  }

  window.addEventListener('scroll', function() {
    if (!ticking) {
      window.requestAnimationFrame(updateShapes);
      ticking = true;
    }
  });
})();

/* ══ 4. ON DOM READY: run reveals ══════════════════════════ */
document.addEventListener('DOMContentLoaded', function() {
  initReveals();
});
