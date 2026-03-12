<?php
require_once 'nav-footer.php';
$currentPage = 'resources';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Resources — ACF Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>
  <link rel="stylesheet" href="Identity.css"/>

  <style>
    /* Resources Page Specific Styles */
    .resources-header {
      text-align: center;
      max-width: 600px;
      margin: 0 auto 3rem;
    }

    /* ── Grid: mirrors .prog-grid layout ── */
    .resource-grid {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      gap: 1.8rem;
    }

    /* Default: each card spans 2 of 6 columns (3 per row) */
    .resource-card { grid-column: span 2; }

    /* Bottom row: 2 cards centered */
    .resource-card.rc4 { grid-column: 2 / span 2; }
    .resource-card.rc5 { grid-column: 4 / span 2; }

    /* ── Card base (mirrors .prog-card) ── */
    .resource-card {
      background: var(--white);
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 2px 10px rgba(30,22,96,.06);
      position: relative;
      transition: transform .3s ease, box-shadow .3s ease;
      text-align: left;
    }

    /* Accent backgrounds per card */
    .rc1 { background: #fff; }
    .rc2 { background: #f0faf8; }
    .rc3 { background: #eef5fc; }
    .rc4 { background: #f5f0fc; }
    .rc5 { background: #fff5ee; }

    /* Pop-shadow hover per card — same style as prog-cards */
    .rc1:hover { transform: translateX(-5px) translateY(-5px); box-shadow: 5px 5px 0 #E8630A, 9px 9px 0 rgba(232,99,10,.18); }
    .rc2:hover { transform: translateX(-5px) translateY(-5px); box-shadow: 5px 5px 0 #2E7BBF, 9px 9px 0 rgba(46,123,191,.18); }
    .rc3:hover { transform: translateX(-5px) translateY(-5px); box-shadow: 5px 5px 0 #0E9E8E, 9px 9px 0 rgba(14,158,142,.18); }
    .rc4:hover { transform: translateX(-5px) translateY(-5px); box-shadow: 5px 5px 0 #9B59B6, 9px 9px 0 rgba(155,89,182,.18); }
    .rc5:hover { transform: translateX(-5px) translateY(-5px); box-shadow: 5px 5px 0 #E8924A, 9px 9px 0 rgba(232,146,74,.18); }

    /* ── Icon wrap ── */
    .resource-icon-wrap {
      width: 64px;
      height: 64px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.4rem;
      font-size: 1.8rem;
    }
    .rc1 .resource-icon-wrap { background: rgba(232,99,10,.10); }
    .rc2 .resource-icon-wrap { background: rgba(14,158,142,.10); }
    .rc3 .resource-icon-wrap { background: rgba(46,123,191,.12); }
    .rc4 .resource-icon-wrap { background: rgba(155,89,182,.12); }
    .rc5 .resource-icon-wrap { background: rgba(232,146,74,.12); }

    /* ── Typography ── */
    .resource-title {
      font-family: 'Fredoka One', cursive;
      font-size: 1.2rem;
      color: #1E1660;
      margin-bottom: .5rem;
      line-height: 1.25;
    }

    .resource-desc {
      font-size: .92rem;
      color: #58587A;
      margin-bottom: 1.4rem;
      line-height: 1.68;
    }

    /* ── Download button ── */
    .btn-download {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #1E1660;
      color: white;
      padding: .75rem 1.5rem;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 900;
      font-size: .9rem;
      font-family: 'Fredoka One', cursive;
      letter-spacing: .03em;
      box-shadow: 0 4px 0 #0d0c3a;
      transition: transform .12s, box-shadow .12s, background .18s;
    }
    .btn-download:hover {
      background: #E8630A;
      box-shadow: 0 2px 0 #b84d08;
      transform: translateY(2px);
    }

    /* ── Meta ── */
    .resource-meta {
      font-size: .78rem;
      color: #999;
      font-weight: 700;
      margin-top: 1rem;
    }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
      .resource-grid { grid-template-columns: repeat(2, 1fr); }
      .resource-card,
      .resource-card.rc4,
      .resource-card.rc5 { grid-column: span 1; }
    }
    @media (max-width: 640px) {
      .resource-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <!-- Background parallax circles -->
  <div id="bg-shapes" aria-hidden="true" class="bg-shapes-layer">
    <div class="bg-shape bg-shape--1"></div>
    <div class="bg-shape bg-shape--2"></div>
    <div class="bg-shape bg-shape--3"></div>
    <div class="bg-shape bg-shape--4"></div>
    <div class="bg-shape bg-shape--5"></div>
  </div>

  <?php acf_nav($currentPage); ?>

  <main class="identity-page">

    <!-- ═══════ HERO ═══════ -->
    <section class="id-hero">
      <div class="id-hero-bg" aria-hidden="true">
        <span class="id-shape id-shape-1"></span>
        <span class="id-shape id-shape-2"></span>
        <span class="id-shape id-shape-3"></span>
      </div>
      <div class="id-hero-inner">
        <div class="id-hero-tag"><span class="id-dot"></span> Knowledge Hub</div>
        <h1 class="id-hero-title">Resource <em>Library</em></h1>
        <p class="id-hero-sub">Download reports, view educational materials, and access our latest publications.</p>
      </div>
    </section>

    <!-- Wave: navy → white -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- ═══════ RESOURCES SECTION ═══════ -->
    <section class="id-section id-section--white" id="resources">
      <div class="id-container">

        <div class="resources-header reveal">
          <div class="chip chip-o">Knowledge Hub</div>
          <h2 class="id-section-title">Our Resources</h2>
          <p class="id-section-sub">Download reports, view educational materials, and access our latest publications.</p>
        </div>

        <div class="resource-grid">
          
          <!-- Resource 1 -->
          <div class="resource-card rc1 reveal reveal-delay-1">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📄</span>
            </div>
            <h3 class="resource-title">2024 Annual Report</h3>
            <p class="resource-desc">A comprehensive look at our impact, financials, and achievements in empowering communities this year.</p>
            <a href="resources/reports/2024-annual-report.pdf" class="btn-download" download="2024-annual-report.pdf">
              <span>Download PDF</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: January 2025 | 📊 2.5 MB</div>
          </div>

          <!-- Resource 2 -->
          <div class="resource-card rc2 reveal reveal-delay-2">
            <div class="resource-icon-wrap">
              <span class="resource-icon">🎥</span>
            </div>
            <h3 class="resource-title">Youth Leadership Video</h3>
            <p class="resource-desc">Watch highlights from our recent workshop series designed for the next generation of leaders.</p>
            <a href="https://youtu.be/qNjVwfIz2tc?si=Giu3RoN71958nktb" class="btn-download" target="_blank" rel="noopener noreferrer">
              <span>Watch on YouTube</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="5 3 19 12 5 21 5 3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: December 2024 | ▶️ YouTube</div>
          </div>

          <!-- Resource 3 -->
          <div class="resource-card rc3 reveal reveal-delay-3">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📜</span>
            </div>
            <h3 class="resource-title">Voters Education Guide</h3>
            <p class="resource-desc">A step-by-step guide on how to register and participate in the upcoming elections.</p>
            <a href="resources/guides/voters-education-guide.pdf" class="btn-download" download="voters-education-guide.pdf">
              <span>Download PDF</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: March 2025 | 📊 1.2 MB</div>
          </div>

          <!-- Resource 4 -->
          <div class="resource-card rc4 reveal reveal-delay-1">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📊</span>
            </div>
            <h3 class="resource-title">Policy Paper: Governance</h3>
            <p class="resource-desc">Our research on systemic approaches to improving local governance and transparency.</p>
            <a href="resources/reports/governance-policy-paper.pdf" class="btn-download" download="governance-policy-paper.pdf">
              <span>Download PDF</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: February 2025 | 📊 3.8 MB</div>
          </div>

          <!-- Resource 5 -->
          <div class="resource-card rc5 reveal reveal-delay-2">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📋</span>
            </div>
            <h3 class="resource-title">Organizational Bylaws</h3>
            <p class="resource-desc">Official bylaws and governance documents of the Active Citizenship Foundation.</p>
            <a href="resources/reports/bylaws.pdf" class="btn-download" download="bylaws.pdf">
              <span>Download PDF</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: November 2024 | 📊 850 KB</div>
          </div>

        </div>

      </div>
    </section>

    <!-- Wave: white → dark footer -->
    <div class="wave" style="background:#ffffff;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,48 C360,0 1080,72 1440,28 L1440,72 L0,72 Z" fill="#0F0C28"/>
      </svg>
    </div>

  </main>

  <?php acf_footer(); ?>

  <script src="nav-init.js"></script>
  <script src="Identity.js"></script>

</body>
</html>
