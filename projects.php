<?php
require_once 'nav-footer.php';
$currentPage = 'projects';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Projects &amp; Impact — ACF Philippines</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>
  <link rel="stylesheet" href="Projects.css"/>
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

  <!-- ═══════════════════════════════════════════════════════
       MODAL OVERLAY — shared by all project detail drawers
  ═══════════════════════════════════════════════════════════ -->
  <div class="pi-modal-overlay" id="pi-modal-overlay" aria-hidden="true">
    <div class="pi-modal" id="pi-modal" role="dialog" aria-modal="true" aria-labelledby="pi-modal-title">
      <button class="pi-modal-close" id="pi-modal-close" aria-label="Close project details">✕</button>
      <div class="pi-modal-inner" id="pi-modal-inner">
        <div class="pi-modal-header" id="pi-modal-header">
          <div class="pi-modal-cat-tag" id="pi-modal-cat"></div>
          <h2 class="pi-modal-title" id="pi-modal-title"></h2>
          <p class="pi-modal-lead"   id="pi-modal-lead"></p>
        </div>
        <div class="pi-modal-body">
          <div class="pi-modal-desc"         id="pi-modal-desc"></div>
          <div class="pi-modal-block"        id="pi-modal-projects-block" style="display:none;">
            <h3 class="pi-modal-sub-heading">Key Initiatives &amp; Projects</h3>
            <ul class="pi-modal-list"        id="pi-modal-projects-list"></ul>
          </div>
          <div class="pi-modal-block"        id="pi-modal-activities-block" style="display:none;">
            <h3 class="pi-modal-sub-heading">How ACF Acts</h3>
            <ul class="pi-modal-list pi-modal-list--check" id="pi-modal-activities-list"></ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <main class="projects-page">

    <!-- ═══════ HERO ═══════ -->
    <section class="pi-hero">
      <div class="pi-hero-bg" aria-hidden="true">
        <span class="pi-shape pi-shape-1"></span>
        <span class="pi-shape pi-shape-2"></span>
        <span class="pi-shape pi-shape-3"></span>
      </div>
      <div class="pi-hero-inner">
        <div class="pi-hero-tag"><span class="pi-dot"></span> On the Ground, Every Day</div>
        <h1 class="pi-hero-title">Projects <em>&amp; Impact</em></h1>
        <p class="pi-hero-sub">From youth mobilization to disaster response — explore the work ACF does across the Philippines to build a more just and democratic society.</p>
        <div class="pi-stats-bar">
          <div class="pi-stat"><span class="pi-stat-num">50+</span><span class="pi-stat-lbl">Active Projects</span></div>
          <div class="pi-stat-divider" aria-hidden="true"></div>
          <div class="pi-stat"><span class="pi-stat-num">17</span><span class="pi-stat-lbl">Provinces Reached</span></div>
          <div class="pi-stat-divider" aria-hidden="true"></div>
          <div class="pi-stat"><span class="pi-stat-num">150k+</span><span class="pi-stat-lbl">Citizens Mobilized</span></div>
          <div class="pi-stat-divider" aria-hidden="true"></div>
          <div class="pi-stat"><span class="pi-stat-num">25+</span><span class="pi-stat-lbl">Years of Impact</span></div>
        </div>
      </div>
    </section>

    <!-- Wave: navy → white -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- ═══════ FILTER + PROJECT GRID ═══════ -->
    <section class="pi-section" id="projects-grid">
      <div class="pi-container">

        <div class="pi-section-top reveal">
          <div class="chip chip-o">The Work</div>
          <h2 class="pi-section-title">Our Programs &amp; Projects</h2>
          <p class="pi-section-sub">Use the filters below to find programs by theme. Click any card to read the full program story.</p>
        </div>

        <!-- FILTER BUTTONS -->
        <div class="pi-filters" role="group" aria-label="Filter projects by category">
          <button class="pi-filter-btn pi-filter-btn--active" data-filter="all">🌐 All Projects</button>
          <button class="pi-filter-btn" data-filter="youth">🎓 Youth &amp; Education</button>
          <button class="pi-filter-btn" data-filter="women">♀ Women &amp; Gender</button>
          <button class="pi-filter-btn" data-filter="governance">🏛 Governance &amp; Democracy</button>
          <button class="pi-filter-btn" data-filter="health">🏥 Health &amp; Humanitarian</button>
          <button class="pi-filter-btn" data-filter="environment">🌿 Environment</button>
        </div>

        <!-- PROJECT CARDS GRID
             data-modal  = matches a key in the JS projectData object
             data-cat    = space-separated filter keywords
             tabindex/role make cards keyboard-accessible                -->
        <div class="pi-grid" id="pi-grid">

          <!-- 1. Collective Participation -->
          <article class="pi-card reveal reveal-delay-1"
                   data-cat="governance"
                   data-modal="collective"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/collective.png" alt="Collective Participation"
                   style="object-fit:contain;background:#eef5fc;padding:2rem;"/>
              <div class="pi-card-cat pi-card-cat--blue">Governance &amp; Democracy</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Promoting Collective &amp; Popular Participation</h3>
              <p class="pi-card-desc">ACF encourages communities to actively engage local issues through education, capacity-building, and the Mabuting Pilipino Movement.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 Ongoing</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 2. Peaceful & Democratic Politics -->
          <article class="pi-card reveal reveal-delay-2"
                   data-cat="governance"
                   data-modal="peace"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/peace.png" alt="Peaceful and Democratic Politics"
                   style="object-fit:contain;background:#f0faf8;padding:2rem;"/>
              <div class="pi-card-cat pi-card-cat--blue">Governance &amp; Democracy</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Ensuring Peaceful &amp; Democratic Politics</h3>
              <p class="pi-card-desc">ACF builds constituencies for peaceful politics and supports international election observers through the COMPACT project.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 Ongoing</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 3. Youth -->
          <article class="pi-card reveal reveal-delay-3"
                   data-cat="youth"
                   data-modal="youth"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/youth.png" alt="Youth Leadership Program"
                   style="object-fit:contain;background:#eef5fc;padding:2rem;"/>
              <div class="pi-card-cat">Youth &amp; Education</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Reaching Out to the Youth</h3>
              <p class="pi-card-desc">Campus- and community-based education, youth campaigns, and network-building — empowering young Filipinos to positively engage government.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 Ongoing</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 4. Women & Gender -->
          <article class="pi-card reveal reveal-delay-1"
                   data-cat="women"
                   data-modal="women"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/sex.png" alt="Gender Advocacy"
                   style="object-fit:contain;background:#fff5ee;padding:2rem;"/>
              <div class="pi-card-cat pi-card-cat--purple">Women &amp; Gender</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Addressing Gender Concerns &amp; Mobilizing Women</h3>
              <p class="pi-card-desc">Gender Rights seminars, livelihood skills trainings, and advocacy for reproductive health — ensuring Filipino women have a full voice in governance.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 Ongoing</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 5. Immediate Needs / Health -->
          <article class="pi-card reveal reveal-delay-2"
                   data-cat="health"
                   data-modal="needs"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/needs.png" alt="Medical Missions"
                   style="object-fit:contain;background:#f0faf8;padding:2rem;"/>
              <div class="pi-card-cat pi-card-cat--teal">Health &amp; Humanitarian</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Responding to Communities' Immediate Needs</h3>
              <p class="pi-card-desc">Medical, dental &amp; surgical missions; feeding programs; reproductive health services; and disaster relief — ACF meets communities at their most vulnerable.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 Ongoing</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 6. Gen Z Voters -->
          <article class="pi-card reveal reveal-delay-3"
                   data-cat="youth governance"
                   data-modal="genz"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/genzvoters.jpg" alt="Gen Z Voters Empowerment"/>
              <div class="pi-card-cat">Youth &amp; Education</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Empowering Gen Z Voters: 2025 Elections</h3>
              <p class="pi-card-desc">ACF's commitment to strengthening youth political participation — equipping the next generation of Filipino voters for meaningful civic engagement.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 April 3, 2025</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 7. Stop Scam Hubs -->
          <article class="pi-card reveal reveal-delay-1"
                   data-cat="governance"
                   data-modal="scam"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/exposingdeceit.jpg" alt="Stop Scam Hubs Campaign"/>
              <div class="pi-card-cat pi-card-cat--blue">Governance &amp; Democracy</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Stop Scam Hubs: Fighting Human Trafficking</h3>
              <p class="pi-card-desc">ACF supported the campaign exposing human trafficking operations and online scam hubs — bringing grassroots advocacy to the national policy stage.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 July 17, 2024</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 8. Voters Education -->
          <article class="pi-card reveal reveal-delay-2"
                   data-cat="youth governance"
                   data-modal="votersedu"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/voterseducation.jpg" alt="Voters Education"/>
              <div class="pi-card-cat pi-card-cat--teal">Youth &amp; Education</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Voters Education Post-COVID</h3>
              <p class="pi-card-desc">Designing a systemic, evidence-based approach to voters' education — rethinking civic learning for the digital and post-pandemic era in the Philippines.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 April 23, 2021</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

          <!-- 9. Environment -->
          <article class="pi-card reveal reveal-delay-3"
                   data-cat="environment governance"
                   data-modal="environment"
                   tabindex="0" role="button">
            <div class="pi-card-img">
              <img src="images/whoweare.jpg" alt="Environmental Protection"/>
              <div class="pi-card-cat pi-card-cat--green">Environment</div>
            </div>
            <div class="pi-card-body">
              <h3 class="pi-card-title">Participatory Environmental Protection</h3>
              <p class="pi-card-desc">Working with communities to develop participatory approaches to environmental stewardship — linking ecological responsibility with democratic governance.</p>
              <div class="pi-card-footer">
                <span class="pi-card-date">📅 Ongoing</span>
                <span class="pi-card-link">Learn More →</span>
              </div>
            </div>
          </article>

        </div><!-- /pi-grid -->

        <div class="pi-no-results" id="pi-no-results" style="display:none;" aria-live="polite">
          <span>🔍</span>
          <p>No projects found in this category yet. Check back soon!</p>
        </div>

      </div><!-- /pi-container -->
    </section>

    <!-- Wave: white → navy -->
    <div class="wave" style="background:#ffffff;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#1E1660"/>
      </svg>
    </div>

    <!-- CTA STRIP -->
    <section class="pi-cta-strip">
      <div class="pi-cta-inner">
        <div class="pi-cta-text">
          <div class="pi-cta-tag">Open to Collaboration</div>
          <h2 class="pi-cta-title">Want to Be Part of the Work?</h2>
          <p class="pi-cta-sub">ACF Philippines works with communities, NGOs, local governments, and international partners. Join us in building a more democratic Philippines.</p>
        </div>
        <div class="pi-cta-actions">
          <a class="pi-cta-btn pi-cta-btn--primary" href="contact.php">✉ Get Involved</a>
          <a class="pi-cta-btn pi-cta-btn--ghost"   href="partners.php">Our Partners →</a>
        </div>
      </div>
      <div class="pi-cta-deco" aria-hidden="true">
        <span class="pi-cta-c1"></span>
        <span class="pi-cta-c2"></span>
      </div>
    </section>

  </main>

  <!-- Wave: navy → dark footer -->
  <div class="wave" style="background:#1E1660;">
    <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,48 C360,0 1080,72 1440,28 L1440,72 L0,72 Z" fill="#0F0C28"/>
    </svg>
  </div>

  <?php acf_footer(); ?>

  <script src="nav-init.js"></script>
  <script src="Projects.js"></script>

</body>
</html>