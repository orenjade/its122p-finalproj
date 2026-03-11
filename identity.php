<?php
require_once 'nav-footer.php';
$currentPage = 'identity';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Our Identity — ACF Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>
  <link rel="stylesheet" href="Identity.css"/>
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
        <div class="id-hero-tag"><span class="id-dot"></span> Est. November 17, 1999</div>
        <h1 class="id-hero-title">Our <em>Identity</em></h1>
        <p class="id-hero-sub">Who we are, why we exist, and the values that drive every community we serve across the Philippines.</p>
      </div>
    </section>

    <!-- Wave: navy → white -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- ═══════ WHO WE ARE (NARRATIVE) ═══════ -->
    <section class="id-section id-section--white" id="who-we-are">
      <div class="id-container">

        <div class="id-who-grid">
          <div class="id-who-img-col reveal">
            <div class="id-who-img-wrap">
              <img src="images/whoweare.jpg" alt="ACF community gathering"/>
              <div class="id-who-badge">🏛 Est. 1999 · SEC Registered</div>
            </div>
            <!-- Floating stat cards -->
            <div class="id-stat-cards">
              <div class="id-stat-card id-stat-card--orange">
                <span class="id-stat-num">25+</span>
                <span class="id-stat-lbl">Years of Service</span>
              </div>
              <div class="id-stat-card id-stat-card--navy">
                <span class="id-stat-num">150k+</span>
                <span class="id-stat-lbl">Citizens Mobilized</span>
              </div>
              <div class="id-stat-card id-stat-card--teal">
                <span class="id-stat-num">25+</span>
                <span class="id-stat-lbl">Partner Organizations</span>
              </div>
            </div>
          </div>

          <div class="id-who-text reveal reveal-delay-1">
            <div class="chip chip-o">Who We Are</div>
            <h2 class="id-section-title">A Strategic Institution for Democratic Change</h2>
            <p>The Active Citizenship Foundation, Inc. (ACF), committed to promoting active citizenship as the main driving force for societal reform and transformation in the Philippines, was founded as a non-stock, non-profit organization and registered with the Securities and Exchange Commission (SEC) on <strong>November 17, 1999</strong>.</p>
            <p>ACF envisions itself as a strategic institution that provides venues for the development and articulation of an orientation geared towards the meaningful engagement of the different arenas of governance. It seeks to assist civil society organizations (CSOs) in building their capabilities and competencies towards translating their organizational strengths into significant power within Philippine society.</p>
            <p>ACF firmly believes that <strong>active citizenship</strong> — people positively engaging government and society at all levels — is the most effective answer to the culture of dependency and apathy, which is the legacy of the several decades of patronage politics experienced by the country.</p>
          </div>
        </div>

      </div>
    </section>

    <!-- Wave: white → navy -->
    <div class="wave" style="background:#ffffff;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,40 C360,0 1080,72 1440,24 L1440,72 L0,72 Z" fill="#1E1660"/>
      </svg>
    </div>

    <!-- ═══════ MISSION · VISION · CORE VALUES ═══════ -->
    <section class="id-section id-section--navy" id="mission-vision">
      <div class="id-container">

        <div class="id-mv-header reveal">
          <div class="chip" style="background:rgba(232,99,10,0.25);color:#F0A060;">Our Purpose</div>
          <h2 class="id-section-title" style="color:#fff;">Mission, Vision &amp; Core Values</h2>
        </div>

        <!-- Mission & Vision side by side -->
        <div class="id-mv-grid">
          <!-- Mission -->
          <div class="id-mv-card id-mv-card--mission reveal reveal-delay-1">
            <div class="id-mv-icon" aria-hidden="true">
              <!-- Target icon -->
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="20" stroke="#E8630A" stroke-width="3"/>
                <circle cx="24" cy="24" r="13" stroke="#E8630A" stroke-width="3"/>
                <circle cx="24" cy="24" r="6" fill="#E8630A"/>
                <line x1="24" y1="4" x2="24" y2="10" stroke="#E8630A" stroke-width="3" stroke-linecap="round"/>
                <line x1="24" y1="38" x2="24" y2="44" stroke="#E8630A" stroke-width="3" stroke-linecap="round"/>
                <line x1="4" y1="24" x2="10" y2="24" stroke="#E8630A" stroke-width="3" stroke-linecap="round"/>
                <line x1="38" y1="24" x2="44" y2="24" stroke="#E8630A" stroke-width="3" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="id-mv-label">Mission</div>
            <p class="id-mv-text">The Active Citizenship Foundation shall create spaces for citizens' <strong>active and meaningful participation</strong> in governance and in key political processes.</p>
          </div>

          <!-- Vision -->
          <div class="id-mv-card id-mv-card--vision reveal reveal-delay-2">
            <div class="id-mv-icon" aria-hidden="true">
              <!-- Eye icon -->
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 24C4 24 12 10 24 10C36 10 44 24 44 24C44 24 36 38 24 38C12 38 4 24 4 24Z" stroke="#2E7BBF" stroke-width="3" stroke-linejoin="round"/>
                <circle cx="24" cy="24" r="6" stroke="#2E7BBF" stroke-width="3"/>
                <circle cx="24" cy="24" r="2.5" fill="#2E7BBF"/>
              </svg>
            </div>
            <div class="id-mv-label" style="color:#2E7BBF;">Vision</div>
            <p class="id-mv-text">We envision the Philippines as a <strong>just, progressive, inclusive, and ecologically responsible society</strong> whose citizens — regardless of age, gender, or socioeconomic status — collectively and meaningfully participate in governance and decision-making processes at all levels.</p>
          </div>
        </div>

        <!-- Strategies / Core Values -->
        <div class="id-strategies reveal">
          <div class="id-strategies-header">
            <div class="chip" style="background:rgba(232,99,10,0.25);color:#F0A060;">How We Work</div>
            <h3 class="id-strategies-title">Our Eight Strategies</h3>
          </div>
          <div class="id-strat-grid">
            <div class="id-strat-item reveal reveal-delay-1">
              <div class="id-strat-num">01</div>
              <p>Build peoples' skills and capacities for active participation through <strong>education and training programs</strong>.</p>
            </div>
            <div class="id-strat-item reveal reveal-delay-2">
              <div class="id-strat-num">02</div>
              <p>Ensure <strong>women's participation</strong> in governance and development and promote gender-inclusive policies.</p>
            </div>
            <div class="id-strat-item reveal reveal-delay-3">
              <div class="id-strat-num">03</div>
              <p>Engage and work with <strong>the youth</strong> and support their active involvement in political, economic, and cultural affairs.</p>
            </div>
            <div class="id-strat-item reveal reveal-delay-1">
              <div class="id-strat-num">04</div>
              <p>Provide support to <strong>humanitarian responses</strong> and encourage active citizenship in disaster response.</p>
            </div>
            <div class="id-strat-item reveal reveal-delay-2">
              <div class="id-strat-num">05</div>
              <p>Advance <strong>political reforms</strong> and democratic politics.</p>
            </div>
            <div class="id-strat-item reveal reveal-delay-3">
              <div class="id-strat-num">06</div>
              <p>Establish links for active collaboration between <strong>local governments and civil society</strong>.</p>
            </div>
            <div class="id-strat-item reveal reveal-delay-1">
              <div class="id-strat-num">07</div>
              <p>Work on <strong>participatory and sustainable environmental protection</strong>.</p>
            </div>
            <div class="id-strat-item reveal reveal-delay-2">
              <div class="id-strat-num">08</div>
              <p>Help build an <strong>international network</strong> of active citizens' movements.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Wave: navy → white -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- ═══════ OUR TEAM ═══════ -->
    <section class="id-section id-section--white" id="our-team">
      <div class="id-container">

        <div class="id-team-header reveal">
          <div class="chip chip-b">The People Behind ACF</div>
          <h2 class="id-section-title">Our Team</h2>
          <p class="id-section-sub">Dedicated public servants and community builders driving democratic change across the Philippines.</p>
        </div>

        <!-- 5-column uniform grid — all cards identical size -->
        <div class="id-team-grid">

          <!-- Arnold Tarrobago -->
          <div class="id-team-card reveal reveal-delay-1">
            <div class="id-team-photo-wrap">
              <img src="images/team/arnold.jpg"
                   alt="Arnold Tarrobago"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
              <div class="id-team-initials" style="display:none;">AT</div>
            </div>
            <div class="id-team-info">
              <div class="id-team-role-tag">Executive Director</div>
              <h3 class="id-team-name">Arnold Tarrobago</h3>
              <p class="id-team-bio">Leads ACF's strategic direction and programs since its founding, championing participatory governance and the empowerment of marginalized communities.</p>
            </div>
          </div>

          <!-- Jordan Gutierrez -->
          <div class="id-team-card reveal reveal-delay-2">
            <div class="id-team-photo-wrap">
              <img src="images/team/jordan.jpg"
                   alt="Jordan Gutierrez"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
              <div class="id-team-initials" style="display:none;">JG</div>
            </div>
            <div class="id-team-info">
              <div class="id-team-role-tag id-team-role-tag--blue">Program Coordinator</div>
              <h3 class="id-team-name">Jordan Gutierrez</h3>
              <p class="id-team-bio">Coordinates ACF's community outreach and civic education programs, building active citizenship networks across communities.</p>
            </div>
          </div>

          <!-- Millie Gines -->
          <div class="id-team-card reveal reveal-delay-3">
            <div class="id-team-photo-wrap">
              <img src="images/team/millie.jpg"
                   alt="Millie Gines"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
              <div class="id-team-initials" style="display:none;">MG</div>
            </div>
            <div class="id-team-info">
              <div class="id-team-role-tag id-team-role-tag--blue">Program Coordinator</div>
              <h3 class="id-team-name">Millie Gines</h3>
              <p class="id-team-bio">Oversees program implementation and partner coordination, ensuring ACF's advocacy work reaches communities effectively.</p>
            </div>
          </div>

          <!-- Wilman Rebusta -->
          <div class="id-team-card reveal reveal-delay-1">
            <div class="id-team-photo-wrap">
              <img src="images/team/wilman.jpg"
                   alt="Wilman Rebusta"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
              <div class="id-team-initials" style="display:none;">WR</div>
            </div>
            <div class="id-team-info">
              <div class="id-team-role-tag id-team-role-tag--teal">Administrative Assistant</div>
              <h3 class="id-team-name">Wilman Rebusta</h3>
              <p class="id-team-bio">Supports daily operations and organizational logistics, keeping ACF's office and field activities running smoothly.</p>
            </div>
          </div>

          <!-- Dhelma Victorio -->
          <div class="id-team-card reveal reveal-delay-2">
            <div class="id-team-photo-wrap">
              <img src="images/team/dhelma.jpg"
                   alt="Dhelma Victorio"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
              <div class="id-team-initials" style="display:none;">DV</div>
            </div>
            <div class="id-team-info">
              <div class="id-team-role-tag id-team-role-tag--teal">Finance &amp; Admin Officer</div>
              <h3 class="id-team-name">Dhelma Victorio</h3>
              <p class="id-team-bio">Manages ACF's financial reporting and administrative operations, ensuring transparency and accountability in all organizational activities.</p>
            </div>
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