<?php
require_once 'nav-footer.php';
$currentPage = 'resources';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Resources - Active Citizenship Foundation Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>

  <style>
    /* Custom styles for Resource Page */
    .resource-hero {
      background: #1E1660;
      color: white;
      padding: 80px 0;
      text-align: center;
    }
    .resource-hero h1 { font-family: 'Fredoka One', cursive; font-size: 3rem; margin-bottom: 10px; }
    .resource-hero p { font-size: 1.2rem; max-width: 600px; margin: 0 auto; }
    
    .resource-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      margin-top: 40px;
    }
    
    .resource-card {
      background: white;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease;
      border-left: 5px solid #FF8C00; /* Orange accent */
    }
    .resource-card:hover { transform: translateY(-5px); }
    
    .resource-icon { font-size: 2rem; margin-bottom: 15px; display: block; }
    .resource-title { font-family: 'Fredoka One', cursive; font-size: 1.5rem; color: #1E1660; margin-bottom: 10px; }
    .resource-desc { color: #555; margin-bottom: 20px; line-height: 1.6; }
    
    .btn-download {
      display: inline-block;
      background: #1E1660;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }
    .btn-download:hover { background: #FF8C00; }
  </style>
</head>
<body>

  <?php acf_nav($currentPage); ?>

  <main>

    <!-- HERO -->
    <section class="resource-hero">
      <div class="container">
        <h1>Resource Library</h1>
        <p>Download reports, view educational materials, and access our latest publications.</p>
      </div>
    </section>

    <!-- Wave Separator -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,40 C360,0 1080,72 1440,24 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- RESOURCES SECTION -->
    <section class="section" id="resources">
      <div class="container">
        <div class="resource-grid">
          
          <!-- Resource 1 -->
          <div class="resource-card reveal">
            <span class="resource-icon">📄</span>
            <h3 class="resource-title">2024 Annual Report</h3>
            <p class="resource-desc">A comprehensive look at our impact, financials, and achievements in empowering communities this year.</p>
            <a href="#" class="btn-download">Download PDF</a>
          </div>

          <!-- Resource 2 -->
          <div class="resource-card reveal reveal-delay-1">
            <span class="resource-icon">🎥</span>
            <h3 class="resource-title">Youth Leadership Video</h3>
            <p class="resource-desc">Watch highlights from our recent workshop series designed for the next generation of leaders.</p>
            <a href="#" class="btn-download">Watch Video</a>
          </div>

          <!-- Resource 3 -->
          <div class="resource-card reveal reveal-delay-2">
            <span class="resource-icon">📜</span>
            <h3 class="resource-title">Voters Education Guide</h3>
            <p class="resource-desc">A step-by-step guide on how to register and participate in the upcoming elections.</p>
            <a href="#" class="btn-download">Read Guide</a>
          </div>

          <!-- Resource 4 -->
          <div class="resource-card reveal reveal-delay-3">
            <span class="resource-icon">📊</span>
            <h3 class="resource-title">Policy Paper: Governance</h3>
            <p class="resource-desc">Our research on systemic approaches to improving local governance and transparency.</p>
            <a href="#" class="btn-download">Download PDF</a>
          </div>

        </div>
      </div>
    </section>

    <!-- Wave Separator -->
    <div class="wave" style="background:#ffffff;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,48 C360,0 1080,72 1440,28 L1440,72 L0,72 Z" fill="#1E1660"/>
      </svg>
    </div>

  </main>

  <?php acf_footer(); ?>

  <script src="nav-init.js"></script>
  <script src="index.js"></script>

</body>
</html>