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
      margin-bottom: 50px;
    }

    .resources-header .id-section-sub {
      color: #666;
      max-width: 600px;
      margin: 0 auto;
    }

    .resource-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
    }

    .resource-card {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-left: 5px solid #FF8C00;
    }

    .resource-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }

    .resource-icon-wrap {
      width: 60px;
      height: 60px;
      background: #f0f0f0;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }

    .resource-icon {
      font-size: 2rem;
    }

    .resource-title {
      font-family: 'Fredoka One', cursive;
      font-size: 1.4rem;
      color: #1E1660;
      margin-bottom: 12px;
    }

    .resource-desc {
      color: #555;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .btn-download {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #1E1660;
      color: white;
      padding: 12px 24px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 700;
      transition: background 0.3s;
      font-family: 'Fredoka One', cursive;
    }

    .btn-download:hover {
      background: #FF8C00;
    }

    .resource-meta {
      font-size: 0.85rem;
      color: #888;
      margin-top: 15px;
    }

    @media (max-width: 768px) {
      .resource-grid {
        grid-template-columns: 1fr;
      }
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
          <div class="resource-card reveal reveal-delay-1">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📄</span>
            </div>
            <h3 class="resource-title">2024 Annual Report</h3>
            <p class="resource-desc">A comprehensive look at our impact, financials, and achievements in empowering communities this year.</p>
            <a href="resources/reports/2024-annual-report.pdf" class="btn-download" download>
              <span>Download PDF</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: January 2025 | 📊 2.5 MB</div>
          </div>

          <!-- Resource 2 -->
          <div class="resource-card reveal reveal-delay-2">
            <div class="resource-icon-wrap">
              <span class="resource-icon">🎥</span>
            </div>
            <h3 class="resource-title">Youth Leadership Video</h3>
            <p class="resource-desc">Watch highlights from our recent workshop series designed for the next generation of leaders.</p>
            <a href="resources/videos/youth-leadership.mp4" class="btn-download" download>
              <span>Watch Video</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="5 3 19 12 5 21 5 3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: December 2024 | 📊 45 MB</div>
          </div>

          <!-- Resource 3 -->
          <div class="resource-card reveal reveal-delay-3">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📜</span>
            </div>
            <h3 class="resource-title">Voters Education Guide</h3>
            <p class="resource-desc">A step-by-step guide on how to register and participate in the upcoming elections.</p>
            <a href="resources/guides/voters-education-guide.pdf" class="btn-download" download>
              <span>Download PDF</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: March 2025 | 📊 1.2 MB</div>
          </div>

          <!-- Resource 4 -->
          <div class="resource-card reveal reveal-delay-1">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📊</span>
            </div>
            <h3 class="resource-title">Policy Paper: Governance</h3>
            <p class="resource-desc">Our research on systemic approaches to improving local governance and transparency.</p>
            <a href="resources/reports/governance-policy-paper.pdf" class="btn-download" download>
              <span>Download PDF</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
            <div class="resource-meta">📅 Updated: February 2025 | 📊 3.8 MB</div>
          </div>

          <!-- Resource 5 -->
          <div class="resource-card reveal reveal-delay-2">
            <div class="resource-icon-wrap">
              <span class="resource-icon">📋</span>
            </div>
            <h3 class="resource-title">Organizational Bylaws</h3>
            <p class="resource-desc">Official bylaws and governance documents of the Active Citizenship Foundation.</p>
            <a href="resources/reports/bylaws.pdf" class="btn-download" download>
              <span>Download PDF</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
