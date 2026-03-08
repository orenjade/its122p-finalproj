/* ═══════════════════════════════════════════════════════════
   PROJECTS.JS — ACF Philippines Projects & Impact Page
   Handles: filter buttons · modal detail drawers ·
            scroll reveal · parallax background circles
═══════════════════════════════════════════════════════════ */

/* ══════════════════════════════════════════════════════════
   1. PROJECT DATA
   Each key matches a card's  data-modal="..."  attribute.
   Fields:
     cat      – coloured category label text
     catColor – 'orange' | 'blue' | 'teal' | 'purple' | 'green'
     title    – full program title
     lead     – one-sentence hook shown in the modal header
     desc     – main narrative paragraph(s), plain text
     projects – array of { name, detail } key initiatives
     activities – array of bullet-point strings (How ACF Acts)
══════════════════════════════════════════════════════════ */
var projectData = {

  collective: {
    cat: 'Governance & Democracy',
    catColor: 'blue',
    title: 'Promoting the Culture of Collective, Popular Participation',
    lead: 'Consciousness-raising and education as the foundation of genuine community power.',
    desc: 'Popular participation and involvement begins with consciousness raising and education. ACF encourages communities to actively and positively engage the issues and problems in their locality by providing education activities and technical assistance, including capacity-building and skills trainings for active participation outside and inside government.',
    projects: [
      {
        name: 'Mabuting Pilipino Movement (MPM)',
        detail: 'ACF acts as the Secretariat of MPM — an association of civil society organizations and individual advocates for anti-corruption and societal transformation representing the youth, progressive artists, "good governance" advocates, workers\' groups, and other reform activists. MPM aims to encourage the strengthening of positive values among the youth, advocacy towards reforming government institutions, and people empowerment.'
      }
    ],
    activities: [
      'Providing education activities and technical assistance to communities',
      'Capacity-building and skills trainings for active participation',
      'Supporting civil society organizations in translating organizational strengths into governance power',
      'Facilitating issue-based advocacy and community dialogue sessions',
      'Secretariat support for the Mabuting Pilipino Movement'
    ]
  },

  peace: {
    cat: 'Governance & Democracy',
    catColor: 'blue',
    title: 'Ensuring Peaceful and Democratic Politics',
    lead: 'Breaking the cycle of political violence and building a genuine culture of democratic participation.',
    desc: 'Violence has been part of Philippine politics for such a long time that it is almost considered to be "normal." Political and electoral violence contributes significantly to the marginalization and disempowerment of many Filipinos from meaningful participation in governance. ACF seeks to address this by building national and local constituencies that advocate for peaceful and democratic politics — linking up with the international movement for peaceful and democratic politics, engaging government towards policy reforms, and supporting peace-building and national reconciliation initiatives.',
    projects: [
      {
        name: 'COMPACT for Peaceful and Democratic Elections',
        detail: 'COMPACT regularly brings in international election observers and experts to several "hotspots" to witness how elections are being conducted and to give recommendations for improvement. The project also highlights "best practices" of active citizenship towards democratization, creating models that communities across the Philippines can replicate.'
      }
    ],
    activities: [
      'Building national and local constituencies for peaceful and democratic politics',
      'Linking with the international movement for democratic governance',
      'Engaging government towards policy reforms ensuring peaceful elections',
      'Supporting government initiatives toward peace-building and national reconciliation',
      'Deploying international election observers to electoral hotspots',
      'Documenting and sharing best practices in active citizenship'
    ]
  },

  youth: {
    cat: 'Youth & Education',
    catColor: 'orange',
    title: 'Reaching Out to the Youth',
    lead: 'Empowering the next generation of Filipino leaders through education, campaigns, and network-building.',
    desc: 'ACF has always encouraged the active involvement of the youth in community affairs. This entails consciousness-raising among the young in schools and communities and involving them in addressing issues and problems both at the national and local levels. The youth are recognized as a critical force for democratic change — and ACF\'s interventions are designed to give them the venues, skills, and networks to act.',
    projects: [],
    activities: [
      'Campus- and community-based education and civic awareness programs',
      'Support for youth issue-related campaigns at local and national levels',
      'Providing venues where the youth can positively engage government',
      'Network-building among youth organizations across the Philippines',
      'Linking Filipino youth organizations with international solidarity networks',
      'Workshops for student councils, barangay youth councils, and young community leaders'
    ]
  },

  women: {
    cat: 'Women & Gender',
    catColor: 'purple',
    title: 'Addressing Gender Concerns and Mobilizing Women',
    lead: 'Ensuring Filipino women have equal access to governance, self-development, and reproductive health.',
    desc: 'Filipino women comprise more than half of the population but many remain largely marginalized, especially in terms of access to government services and opportunities for self-development. To address this, ACF encourages women to be active participants in community affairs by providing them with opportunities for involvement and supporting local, women-led initiatives. ACF also actively advocates for the immediate passage of the Reproductive Health Bill, which will ensure that Filipino women — especially the poorest of the poor — have access to safe, free and professional Reproductive Health and Education programs and services from government.',
    projects: [
      {
        name: 'Gender Rights Seminars',
        detail: 'Regular seminars empowering women with knowledge of their rights under Philippine law and international conventions, and providing tools for advocacy and community organizing.'
      },
      {
        name: 'Livelihood Skills Trainings',
        detail: 'Practical skills training programs that open economic pathways for marginalized women, reducing dependency and increasing capacity for community leadership.'
      },
      {
        name: 'Reproductive Health Advocacy',
        detail: 'ACF advocates for women\'s access to comprehensive reproductive health services, including support for the Reproductive Health Bill ensuring government-provided services for the most vulnerable Filipino women.'
      }
    ],
    activities: [
      'Organizing regular Gender Rights seminars in communities',
      'Facilitating livelihood and economic skills trainings for women',
      'Supporting local, women-led initiatives and campaigns',
      'Advocating for reproductive health legislation and services',
      'Mobilizing women for active participation in barangay and local governance',
      'Linking women\'s groups with government services and civil society networks'
    ]
  },

  needs: {
    cat: 'Health & Humanitarian',
    catColor: 'teal',
    title: "Responding to Communities' Immediate Needs",
    lead: 'Meeting the most vulnerable where they are — with medical care, food, and disaster relief.',
    desc: 'ACF facilitates regular Medical Missions to serve communities with little access to such services. Apart from regular Dental and Surgical Missions done in cooperation with volunteer doctors\' and nurses\' associations, ACF also provides basic reproductive health services for women, including free Pap Smear for deserving beneficiaries. ACF also conducts regular Feeding Programs, in cooperation with Local Government Units and certain pharmaceutical companies, to serve malnourished and under-nourished children and senior citizens in poor communities. Through its network of volunteers and partner agencies in government, ACF also provides relief support to communities hard-hit by disasters.',
    projects: [
      {
        name: 'Medical, Dental & Surgical Missions',
        detail: 'Regular missions conducted in cooperation with volunteer doctors\' and nurses\' associations, reaching communities with little or no access to medical care. Services include general medical consultation, dental care, surgical procedures, and reproductive health services including free Pap Smear for qualifying women.'
      },
      {
        name: 'Community Feeding Programs',
        detail: 'Conducted in cooperation with Local Government Units and pharmaceutical companies, these programs serve malnourished children and senior citizens in the poorest communities across the Philippines.'
      },
      {
        name: 'Disaster Relief Missions',
        detail: 'ACF has provided relief support after major disasters including Super Typhoon Ondoy (in cooperation with DSWD-NCR, DSWD-Region 1, and DSWD-Region 3), continuing relief for Mt. Mayon refugees in the Bicol Region, and regular Training Seminars on Disaster Risk Reduction Management.'
      }
    ],
    activities: [
      'Facilitating regular medical, dental, and surgical missions',
      'Providing reproductive health services including free Pap Smear',
      'Running feeding programs for malnourished children and senior citizens',
      'Coordinating disaster relief with DSWD and other government agencies',
      'Training community members in Disaster Risk Reduction Management',
      'Mobilizing volunteer doctors, nurses, and health professionals'
    ]
  },

  genz: {
    cat: 'Youth & Education',
    catColor: 'orange',
    title: 'Empowering Gen Z Voters: Strengthening Youth Participation in the 2025 Elections',
    lead: 'Generation Z voters are emerging as a formidable force in Philippine elections — ACF is making sure they are ready.',
    desc: 'Generation Z voters are emerging as a formidable force in Philippine elections, significantly influencing the country\'s democratic landscape. ACF\'s commitment to youth electoral participation recognizes that first-time and young voters need not just information, but genuine civic empowerment — tools, networks, and confidence to participate meaningfully. This initiative provides voter education, community organizing support, and platforms for young people to raise their voices in the democratic process ahead of the 2025 national elections.',
    projects: [
      {
        name: 'Youth Voter Education Campaign (2025)',
        detail: 'Campus- and community-based orientation sessions equipping Gen Z voters with understanding of the electoral process, candidate evaluation, and their rights as voters — with special attention to combating disinformation and vote-buying.'
      }
    ],
    activities: [
      'Campus and community voter education drives targeting first-time voters',
      'Social media literacy and counter-disinformation training for young voters',
      'Mobilizing youth organizations as election watchers and monitors',
      'Connecting young voters with COMPACT election observation networks',
      'Issue-based forums where youth can engage candidates directly'
    ]
  },

  scam: {
    cat: 'Governance & Democracy',
    catColor: 'blue',
    title: 'Exposing Deceit: The Stop Scam Hubs Campaign',
    lead: 'Fighting human trafficking and online fraud through advocacy, policy engagement, and community awareness.',
    desc: 'In November 2022, the Office of Senator Risa Hontiveros uncovered a harrowing human trafficking operation in Myanmar — exposing the existence of scam hubs that lure Filipinos with promises of overseas jobs and then trap them in criminal operations. ACF supported the Stop Scam Hubs Campaign, bringing the issue from national headlines into grassroots community awareness and connecting it to ACF\'s long-standing work on democratic rights, labor protection, and anti-corruption advocacy.',
    projects: [
      {
        name: 'Stop Scam Hubs Awareness Campaign',
        detail: 'Community-level awareness sessions helping Filipinos — particularly the young and economically vulnerable — identify and avoid overseas job scams, understand their rights, and report trafficking. The campaign links grassroots education with national policy advocacy.'
      }
    ],
    activities: [
      'Community education on human trafficking red flags and scam recruitment tactics',
      'Supporting national policy advocacy for stronger anti-trafficking legislation',
      'Coordinating with government agencies on survivor support and repatriation',
      'Raising awareness through ACF\'s civil society and partner networks',
      'Amplifying the voices of survivors and affected communities in policy debates'
    ]
  },

  votersedu: {
    cat: 'Youth & Education',
    catColor: 'teal',
    title: "Voters Education Post-COVID: Designing a Systemic Approach",
    lead: 'Rethinking civic learning for the digital and post-pandemic era in the Philippines.',
    desc: "The COVID-19 pandemic disrupted traditional voters' education programs across the Philippines — but it also opened new possibilities for reaching citizens online. ACF's policy paper \"It's the System, Stupid!\" argues for a systemic, evidence-based redesign of voters' education: moving beyond one-time pre-election campaigns toward sustained civic learning embedded in schools, communities, and digital spaces. The paper calls for coordinated action between COMELEC, civil society, media, and local governments to build an informed and engaged citizenry year-round.",
    projects: [
      {
        name: 'Systemic Voters Education Policy Paper (April 2021)',
        detail: "A landmark ACF publication proposing a comprehensive redesign of voters' education in the Philippines — arguing that fragmented, one-time campaigns are insufficient and that sustained, multi-stakeholder civic education is the only path to genuine democratic participation."
      }
    ],
    activities: [
      "Developing evidence-based policy recommendations for COMELEC and government",
      "Advocating for year-round, school-embedded civic education programs",
      "Designing digital and community-based voters education modules",
      "Engaging civil society coalitions for coordinated electoral education",
      "Monitoring and evaluating the effectiveness of existing voters education programs"
    ]
  },

  environment: {
    cat: 'Environment',
    catColor: 'green',
    title: 'Participatory and Sustainable Environmental Protection',
    lead: 'Linking community empowerment with ecological responsibility — because democracy must protect the earth too.',
    desc: 'ACF works with communities to develop participatory approaches to environmental stewardship. True democratic governance must extend to how communities manage, protect, and sustain their natural environment. ACF supports local communities in advocating for environmental policies, engaging local governments on ecological issues, and building the skills to participate meaningfully in environmental decision-making processes at all levels.',
    projects: [
      {
        name: 'Community-Based Environmental Advocacy',
        detail: 'ACF supports local communities in identifying environmental threats, organizing for protective action, and engaging local government units to adopt environmentally responsible policies. This work connects ACF\'s broader civic education and governance programs with on-the-ground ecological concerns.'
      }
    ],
    activities: [
      'Supporting communities in identifying and documenting environmental threats',
      'Facilitating engagement between communities and local government on ecological policy',
      'Building community capacity for environmental monitoring and advocacy',
      'Linking environmental concerns with broader governance and democratic participation work',
      'Partnering with national and international environmental civil society organizations',
      'Integrating environmental education into ACF civic education programs'
    ]
  }

}; /* end projectData */


/* ══════════════════════════════════════════════════════════
   2. MODAL SYSTEM
══════════════════════════════════════════════════════════ */
(function () {
  var overlay   = document.getElementById('pi-modal-overlay');
  var modal     = document.getElementById('pi-modal');
  var closeBtn  = document.getElementById('pi-modal-close');

  var elCat        = document.getElementById('pi-modal-cat');
  var elTitle      = document.getElementById('pi-modal-title');
  var elLead       = document.getElementById('pi-modal-lead');
  var elDesc       = document.getElementById('pi-modal-desc');
  var elProjBlock  = document.getElementById('pi-modal-projects-block');
  var elProjList   = document.getElementById('pi-modal-projects-list');
  var elActBlock   = document.getElementById('pi-modal-activities-block');
  var elActList    = document.getElementById('pi-modal-activities-list');

  /* Color map → CSS modifier classes */
  var catColorMap = {
    orange: 'pi-modal-cat--orange',
    blue:   'pi-modal-cat--blue',
    teal:   'pi-modal-cat--teal',
    purple: 'pi-modal-cat--purple',
    green:  'pi-modal-cat--green'
  };

  function openModal(key) {
    var data = projectData[key];
    if (!data) return;

    /* ── Populate header ── */
    elCat.textContent = data.cat;
    elCat.className   = 'pi-modal-cat-tag ' + (catColorMap[data.catColor] || '');
    elTitle.textContent = data.title;
    elLead.textContent  = data.lead;

    /* ── Populate description ── */
    elDesc.innerHTML = '<p>' + data.desc + '</p>';

    /* ── Key projects block ── */
    if (data.projects && data.projects.length > 0) {
      elProjList.innerHTML = '';
      data.projects.forEach(function (p) {
        var li = document.createElement('li');
        li.className = 'pi-modal-project-item';
        li.innerHTML = '<strong class="pi-modal-project-name">' + p.name + '</strong>'
                     + '<p class="pi-modal-project-detail">' + p.detail + '</p>';
        elProjList.appendChild(li);
      });
      elProjBlock.style.display = '';
    } else {
      elProjBlock.style.display = 'none';
    }

    /* ── Activities block ── */
    if (data.activities && data.activities.length > 0) {
      elActList.innerHTML = '';
      data.activities.forEach(function (a) {
        var li = document.createElement('li');
        li.textContent = a;
        elActList.appendChild(li);
      });
      elActBlock.style.display = '';
    } else {
      elActBlock.style.display = 'none';
    }

    /* ── Show overlay ── */
    overlay.classList.add('pi-modal-overlay--open');
    overlay.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    /* Scroll modal back to top */
    modal.scrollTop = 0;

    /* Focus the close button for accessibility */
    setTimeout(function () { closeBtn.focus(); }, 60);
  }

  function closeModal() {
    overlay.classList.remove('pi-modal-overlay--open');
    overlay.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  /* Attach click to every project card */
  document.querySelectorAll('.pi-card[data-modal]').forEach(function (card) {
    card.addEventListener('click', function () {
      openModal(card.getAttribute('data-modal'));
    });
    /* Keyboard: Enter or Space also opens the modal */
    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        openModal(card.getAttribute('data-modal'));
      }
    });
  });

  /* Close button */
  closeBtn.addEventListener('click', closeModal);

  /* Click outside modal panel closes it */
  overlay.addEventListener('click', function (e) {
    if (e.target === overlay) closeModal();
  });

  /* Escape key closes it */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeModal();
  });

})();


/* ══════════════════════════════════════════════════════════
   3. FILTER BUTTONS
══════════════════════════════════════════════════════════ */
(function () {
  var filterBtns = document.querySelectorAll('.pi-filter-btn');
  var cards      = document.querySelectorAll('.pi-card');
  var noResults  = document.getElementById('pi-no-results');

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var filter = btn.getAttribute('data-filter');

      filterBtns.forEach(function (b) { b.classList.remove('pi-filter-btn--active'); });
      btn.classList.add('pi-filter-btn--active');

      var visible = 0;
      cards.forEach(function (card) {
        var cats    = card.getAttribute('data-cat') || '';
        var matches = filter === 'all' || cats.split(' ').indexOf(filter) !== -1;
        if (matches) {
          card.classList.remove('pi-card--hidden');
          visible++;
        } else {
          card.classList.add('pi-card--hidden');
        }
      });

      if (noResults) {
        noResults.style.display = visible === 0 ? 'block' : 'none';
      }
    });
  });
})();


/* ══════════════════════════════════════════════════════════
   4. SCROLL REVEAL
══════════════════════════════════════════════════════════ */
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


/* ══════════════════════════════════════════════════════════
   5. PARALLAX BACKGROUND CIRCLES
══════════════════════════════════════════════════════════ */
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