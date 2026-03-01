<?php
require_once 'nav-footer.php';
$currentPage = 'partners';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Partners &amp; Voices — ACF Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>
  <link rel="stylesheet" href="partners-voices.css"/>
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

  <main class="partners-page" id="page-partners">

    <!-- ═══════ HERO ═══════ -->
    <section class="pv-hero">
      <div class="pv-hero-bg-shapes" aria-hidden="true">
        <span class="pv-shape pv-shape-1"></span>
        <span class="pv-shape pv-shape-2"></span>
        <span class="pv-shape pv-shape-3"></span>
      </div>
      <div class="pv-hero-inner">
        <div class="pv-hero-tag"><span class="pv-dot"></span> Coalition &amp; Collaboration</div>
        <h1 class="pv-hero-title">Partners <br/><em>&amp; Voices</em></h1>
        <p class="pv-hero-sub">Change is never built alone. Meet the organizations, communities, and champions who stand with ACF Philippines in the work of building genuine democracy.</p>
        <div class="pv-hero-stats">
          <div class="pv-stat">
            <span class="pv-stat-num">25+</span>
            <span class="pv-stat-lbl">Partner Organizations</span>
          </div>
          <div class="pv-stat-divider" aria-hidden="true"></div>
          <div class="pv-stat">
            <span class="pv-stat-num">17</span>
            <span class="pv-stat-lbl">Years of Coalition Work</span>
          </div>
          <div class="pv-stat-divider" aria-hidden="true"></div>
          <div class="pv-stat">
            <span class="pv-stat-num">150k+</span>
            <span class="pv-stat-lbl">Citizens Mobilized</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Wave: navy hero → white section -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- ═══════ PARTNERS BENTO GRID ═══════ -->
    <section class="pv-section" aria-label="Our Partners">
      <div class="pv-container">

        <!-- ─── PARTNER 1 ─── -->
        <div class="pv-section-label">
          <div class="chip chip-o">Partner 01</div>
          <h2 class="pv-partner-heading">Akbayan Women</h2>
        </div>

        <div class="bento-grid">
          <div class="bento-cell bento-large bento-dark">
            <div class="bento-video-wrap">
              <iframe src="https://www.youtube.com/embed/3cT6Pgwg7og" title="Kit Melgar — Akbayan Women on ACF Partnership" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="bento-video-meta">
              <span class="bento-tag">Partner Voice</span>
              <p class="bento-video-title">Kit Melgar speaks on the Akbayan Women &amp; ACF partnership</p>
            </div>
          </div>

          <div class="bento-cell bento-small bento-orange" role="blockquote">
            <div class="bento-quote-deco" aria-hidden="true"></div>
            <div class="bento-quote-mark" aria-hidden="true">"</div>
            <p class="bento-quote-text">This pandemic we reinvented our partnership with ACF and explored online local organizing — the Buklod Aral series let grassroot women meet and discuss their personal issues alongside local and national concerns.</p>
            <footer class="bento-attribution">
              <div class="bento-avatar" aria-hidden="true">KM</div>
              <div>
                <strong class="bento-author">Kit Melgar</strong>
                <span class="bento-role">Women Leader, Akbayan Women</span>
              </div>
            </footer>
            <div class="bento-badge" aria-hidden="true">Highlight</div>
          </div>

          <div class="bento-cell bento-small bento-light">
            <div class="bento-arrow" aria-hidden="true">↗</div>
            <div class="bento-info-tag">NGO Partner</div>
            <h3 class="bento-org-name">Akbayan Women</h3>
            <p class="bento-org-desc">Supporting a socialist, feminist agenda and the formation of local women's groups. Together with ACF, they launched the <strong>Buklod Aral</strong> online organizing series during the pandemic.</p>
          </div>
        </div>

        <div class="pv-partner-divider" aria-hidden="true"><span></span><span class="pv-divider-icon">✦</span><span></span></div>

        <!-- ─── PARTNER 2 ─── -->
        <div class="pv-section-label">
          <div class="chip chip-b">Partner 02</div>
          <h2 class="pv-partner-heading">SIM-CARRD Inc.</h2>
        </div>

        <div class="bento-grid bento-grid--flip">
          <div class="bento-cell bento-small bento-navy">
            <div class="bento-arrow bento-arrow--light" aria-hidden="true">↗</div>
            <div class="bento-info-tag bento-info-tag--light">Local Resource Partner</div>
            <h3 class="bento-org-name bento-org-name--light">SIM-CARRD Inc.</h3>
            <p class="bento-org-desc bento-org-desc--light">A local resource partner focused on democratizing local governments in Mindanao through liberating education and participative methodology that elevates communities.</p>
          </div>

          <div class="bento-cell bento-small bento-teal" role="blockquote">
            <div class="bento-quote-deco" aria-hidden="true"></div>
            <div class="bento-quote-mark" aria-hidden="true">"</div>
            <p class="bento-quote-text">ACF plays a major role in shaping democratic governance, empowered communities, and meaningful representation. SIM-CARRD will always support ACF's interventions in our communities. Long live ACF!</p>
            <footer class="bento-attribution">
              <div class="bento-avatar" aria-hidden="true">AK</div>
              <div>
                <strong class="bento-author">Angie Katoh</strong>
                <span class="bento-role">SIM-CARRD Inc., Mindanao</span>
              </div>
            </footer>
            <div class="bento-badge" aria-hidden="true">Highlight</div>
          </div>

          <div class="bento-cell bento-large bento-dark">
            <div class="bento-video-wrap">
              <iframe src="https://www.youtube.com/embed/AVJuomX1vhM" title="Angie Katoh — SIM-CARRD Inc. on ACF Partnership" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="bento-video-meta">
              <span class="bento-tag">Partner Voice</span>
              <p class="bento-video-title">Angie Katoh on ACF's role in democratizing Mindanao communities</p>
            </div>
          </div>
        </div>

        <div class="pv-partner-divider" aria-hidden="true"><span></span><span class="pv-divider-icon">✦</span><span></span></div>

        <!-- ─── PARTNER 3 ─── -->
        <div class="pv-section-label">
          <div class="chip chip-o">Partner 03</div>
          <h2 class="pv-partner-heading">Center for Youth Advocacy &amp; Networking</h2>
        </div>

        <div class="bento-grid">
          <div class="bento-cell bento-large bento-dark">
            <div class="bento-video-wrap">
              <iframe src="https://www.youtube.com/embed/J3HsEn4jE1A" title="Justine Balane — CYAN Akbayan Youth on ACF Partnership" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="bento-video-meta">
              <span class="bento-tag">Partner Voice</span>
              <p class="bento-video-title">Justine Balane on building the foundations of a strong youth movement</p>
            </div>
          </div>

          <div class="bento-cell bento-small bento-orange" role="blockquote">
            <div class="bento-quote-deco" aria-hidden="true"></div>
            <div class="bento-quote-mark" aria-hidden="true">"</div>
            <p class="bento-quote-text">ACF helped us greatly in building the foundations of a strong youth movement — empowering student councils, committee-based youth, and young village leaders to organize toward a progressive agenda.</p>
            <footer class="bento-attribution">
              <div class="bento-avatar" aria-hidden="true">JB</div>
              <div>
                <strong class="bento-author">Justine Balane</strong>
                <span class="bento-role">CYAN, Akbayan Youth</span>
              </div>
            </footer>
            <div class="bento-badge" aria-hidden="true">Highlight</div>
          </div>

          <div class="bento-cell bento-small bento-light">
            <div class="bento-arrow" aria-hidden="true">↗</div>
            <div class="bento-info-tag">Youth Organization</div>
            <h3 class="bento-org-name">CYAN — Akbayan Youth</h3>
            <p class="bento-org-desc">Through organizing, webinars, and policy discussions, ACF and CYAN reached cities and provinces during the pandemic and bridged Filipino youth with <strong>international organizations</strong> for solidarity and learning.</p>
          </div>
        </div>

        <div class="pv-partner-divider" aria-hidden="true"><span></span><span class="pv-divider-icon">✦</span><span></span></div>

        <!-- ─── PARTNER 4 ─── -->
        <div class="pv-section-label">
          <div class="chip chip-b">Partner 04</div>
          <h2 class="pv-partner-heading">Local Government — Cebu City</h2>
        </div>

        <div class="bento-grid bento-grid--flip">
          <div class="bento-cell bento-small bento-navy">
            <div class="bento-arrow bento-arrow--light" aria-hidden="true">↗</div>
            <div class="bento-info-tag bento-info-tag--light">Government Partner</div>
            <h3 class="bento-org-name bento-org-name--light">Cebu City Council</h3>
            <p class="bento-org-desc bento-org-desc--light">ACF's capacity building program for local government officials anchors public service in participatory governance — building communities for the people, by the people, of the people.</p>
          </div>

          <div class="bento-cell bento-small bento-orange" role="blockquote">
            <div class="bento-quote-deco" aria-hidden="true"></div>
            <div class="bento-quote-mark" aria-hidden="true">"</div>
            <p class="bento-quote-text">The people themselves are in the best position to articulate their needs. ACF taught us that the best approach will always be from the grassroots — through meaningful consultation and active citizenship.</p>
            <footer class="bento-attribution">
              <div class="bento-avatar" aria-hidden="true">AD</div>
              <div>
                <strong class="bento-author">Alvin Dizon</strong>
                <span class="bento-role">Councilor, Cebu City</span>
              </div>
            </footer>
            <div class="bento-badge" aria-hidden="true">Highlight</div>
          </div>

          <div class="bento-cell bento-large bento-dark">
            <div class="bento-video-wrap">
              <iframe src="https://www.youtube.com/embed/uOf_ML5xIJk" title="Alvin Dizon — Councilor Cebu City on ACF Partnership" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="bento-video-meta">
              <span class="bento-tag">Partner Voice</span>
              <p class="bento-video-title">Councilor Alvin Dizon on participatory governance and active citizenship</p>
            </div>
          </div>
        </div>

      </div><!-- /pv-container -->
    </section>

    <!-- Wave: white section → navy CTA -->
    <div class="wave" style="background:#ffffff;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#1E1660"/>
      </svg>
    </div>

    <!-- ═══════ CTA STRIP ═══════ -->
    <section class="pv-cta-strip" aria-label="Become a partner call to action">
      <div class="pv-cta-inner">
        <div class="pv-cta-text">
          <div class="pv-cta-tag">Open Coalition</div>
          <h2 class="pv-cta-title">Want to Build Democracy With Us?</h2>
          <p class="pv-cta-sub">ACF Philippines welcomes new partners — organizations, networks, and communities committed to peaceful, people-powered change.</p>
        </div>
        <div class="pv-cta-actions">
          <a class="pv-cta-btn pv-cta-btn--primary" href="contact.php">✉ Partner With ACF</a>
          <a class="pv-cta-btn pv-cta-btn--ghost"   href="identity.php">Learn Our Model</a>
        </div>
      </div>
      <div class="pv-cta-deco" aria-hidden="true">
        <span class="pv-cta-circle pv-cta-c1"></span>
        <span class="pv-cta-circle pv-cta-c2"></span>
      </div>
    </section>

  </main>

  <!-- Wave: navy CTA → dark footer -->
  <div class="wave" style="background:#1E1660;">
    <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,48 C360,0 1080,72 1440,28 L1440,72 L0,72 Z" fill="#0F0C28"/>
    </svg>
  </div>

  <?php acf_footer(); ?>

  <script src="nav-init.js"></script>
  <script src="partners.js"></script>

</body>
</html>
