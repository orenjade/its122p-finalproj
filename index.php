<?php
require_once 'nav-footer.php';
$currentPage = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Active Citizenship Foundation Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>
</head>
<body>

  <?php acf_nav($currentPage); ?>

  <main>

    <!-- HERO -->
    <section class="hero">
      <div class="yt-wrap">
        <video id="hero-video" autoplay muted loop playsinline preload="auto">
          <source src="images/intro.mp4" type="video/mp4"/>
        </video>
      </div>
      <div class="hero-overlay"></div>

      <div class="hero-content">
        <div class="hero-badge">Empowering Communities Since 1999</div>
        <h1 class="hero-h1">Encouraging<br/><em>Citizen Participation.</em></h1>
        <p class="hero-p">Ensuring Peaceful and Democratic Politics · Sustaining peaceful socio-cultural development — one community at a time.</p>
        <div class="hero-btns">
          <a class="btn-orange" href="projects.php">🌱 Our Programs</a>
          <a class="btn-ghost"  href="identity.php">Learn About ACF</a>
        </div>
      </div>

      <a class="hero-pill" href="contact.php">✉ Get Involved →</a>
    </section>

    <!-- Curved SVG scroll animation -->
    <div class="hero-curve-svg" aria-hidden="true">
      <svg viewBox="0 0 800 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path id="hero-curve-path" fill="#ffffff" d="M 800 80 Q 400 120 0 80 L 0 120 L 800 120 Z"/>
      </svg>
    </div>

    <!-- WHO WE ARE -->
    <section class="section who-bg" id="who">
      <div class="container">
        <div class="who-grid">
          <div class="who-img reveal">
            <img src="images/whoweare.jpg" alt="ACF community gathering"/>
            <div class="who-img-tag">🏛 Est. November 17, 1999</div>
          </div>
          <div class="who-text reveal reveal-delay-1">
            <div class="chip chip-n">Who We Are</div>
            <h2 class="section-title">A People's Organization for Democratic Change</h2>
            <p>Active Citizenship Foundation (ACF) was founded on November 17, 1999, as a non-stock, non-profit organization dedicated to fostering people's active participation in community life and democratic governance.</p>
            <p>Our mission is to empower marginalized communities — especially the poorest of the poor — by upgrading their skills and capabilities. We bridge the gap between citizens and the services of government and civil society.</p>
            <a class="btn-navy-outline" href="identity.php">Read Our Full Story →</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Wave: white to navy -->
    <div class="wave" style="background:#ffffff;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,40 C360,0 1080,72 1440,24 L1440,72 L0,72 Z" fill="#1E1660"/>
      </svg>
    </div>

    <!-- CORE PROGRAMS -->
    <section class="section programs-bg" id="programs">
      <div class="container">
        <div class="programs-header">
          <div class="chip chip-o">What We Do</div>
          <h2 class="section-title">Our Core Programs</h2>
          <p class="section-sub">From youth leadership to gender advocacy — hover each card to explore.</p>
        </div>
        <div class="prog-grid">

          <div class="prog-card c1 reveal reveal-delay-1">
            <div class="prog-icon"><img src="images/youth.png" alt="Youth"/></div>
            <div class="prog-title">Reaching Out to the Youth</div>
            <p class="prog-desc">Encouraging active involvement and consciousness-raising among tomorrow's young leaders through workshops and civic education.</p>
          </div>

          <div class="prog-card c2 reveal reveal-delay-2">
            <div class="prog-icon"><img src="images/peace.png" alt="Peace"/></div>
            <div class="prog-title">Peaceful &amp; Democratic Politics</div>
            <p class="prog-desc">Moving beyond political violence toward a culture of peace, dialogue, and genuine democratic participation.</p>
          </div>

          <div class="prog-card c3 reveal reveal-delay-3">
            <div class="prog-icon"><img src="images/collective.png" alt="Collective"/></div>
            <div class="prog-title">Promoting Collective Participation</div>
            <p class="prog-desc">Building community engagement through education and issue-based advocacy to amplify grassroots voices in governance.</p>
          </div>

          <div class="prog-card c4 reveal reveal-delay-2">
            <div class="prog-icon"><img src="images/needs.png" alt="Needs"/></div>
            <div class="prog-title">Responding to Immediate Needs</div>
            <p class="prog-desc">Facilitating medical, dental, and surgical missions for underserved and marginalized communities across the Philippines.</p>
          </div>

          <div class="prog-card c5 prog-grid-5th reveal reveal-delay-3">
            <div class="prog-icon"><img src="images/sex.png" alt="Gender"/></div>
            <div class="prog-title">Addressing Gender Concerns</div>
            <p class="prog-desc">Mobilizing women and ensuring equal access to resources, representation, and participation in governance and civic life.</p>
          </div>

        </div>
        <div class="programs-cta reveal">
          <a class="btn-orange" href="projects.php">View All Projects &amp; Impact →</a>
        </div>
      </div>
    </section>
    <!-- Wave: navy to white -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- LATEST NEWS -->
    <section class="section news-bg" id="news-home">
      <div class="container">
        <div class="chip chip-b">Latest From the Field</div>
        <h2 class="section-title">Stories of Change</h2>
        <div class="news-grid">

          <article class="news-card reveal reveal-delay-1">
            <div class="nc-img"><img src="images/genzvoters.jpg" alt="Youth Voters"/></div>
            <div class="nc-body">
              <span class="nc-tag">Elections</span>
              <h3 class="nc-title">Empowering Gen Z Voters: ACF's Commitment to Strengthening Youth Participation in the 2025 Elections</h3>
              <p>Generation Z (Gen Z) voters are emerging as a formidable force in Philippine elections, significantly influencing the country's democratic landscape.</p>
              <div class="nc-date">📅 April 3, 2025</div>
            </div>
          </article>

          <article class="news-card reveal reveal-delay-2">
            <div class="nc-img"><img src="images/exposingdeceit.jpg" alt="Stop Scam Hubs"/></div>
            <div class="nc-body">
              <span class="nc-tag">Official Reports</span>
              <h3 class="nc-title">Exposing Deceit: The Stop Scam Hubs Campaign's Fight Against Human Trafficking and Online Fraud</h3>
              <p>In November 2022, the Office of Senator Risa Hontiveros (OSRH) uncovered a harrowing human trafficking operation in Myanmar.</p>
              <div class="nc-date">📅 July 17, 2024</div>
            </div>
          </article>

          <article class="news-card reveal reveal-delay-3">
            <div class="nc-img"><img src="images/voterseducation.jpg" alt="Policy Papers"/></div>
            <div class="nc-body">
              <span class="nc-tag">Policy Papers</span>
              <h3 class="nc-title">Voters Education post-Covid</h3>
              <p>IT'S THE SYSTEM, STUPID! DESIGNING A SYSTEMIC APPROACH TO VOTERS' EDUCATION IN THE PHILIPPINES</p>
              <div class="nc-date">📅 April 23, 2021</div>
            </div>
          </article>

        </div>
      </div>
    </section>

    <!-- Wave: white to footer -->
    <div class="wave" style="background:#ffffff;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,48 C360,0 1080,72 1440,28 L1440,72 L0,72 Z" fill="#0F0C28"/>
      </svg>
    </div>

  </main>

  <?php acf_footer(); ?>

  <script src="nav-init.js"></script>
  <script src="index.js"></script>

</body>
</html>
