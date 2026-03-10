-- ═══════════════════════════════════════════════════════════
-- ACF PHILIPPINES — DATABASE SCHEMA
-- Engine: MySQL / MariaDB
-- ═══════════════════════════════════════════════════════════

CREATE DATABASE IF NOT EXISTS acf_philippines
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE acf_philippines;

-- ─────────────────────────────────────────────
-- USERS — stores both admin and public accounts
-- ─────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS users (
  id            INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  full_name     VARCHAR(120)    NOT NULL,
  email         VARCHAR(180)    NOT NULL UNIQUE,
  password_hash VARCHAR(255)    NOT NULL,              -- bcrypt via PHP password_hash()
  role          ENUM('admin','user') NOT NULL DEFAULT 'user',
  is_active     TINYINT(1)      NOT NULL DEFAULT 1,
  created_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_login    DATETIME,
  PRIMARY KEY (id),
  INDEX idx_email (email),
  INDEX idx_role  (role)
) ENGINE=InnoDB;

-- ─────────────────────────────────────────────
-- NEWS / ARTICLES
-- ─────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS news_articles (
  id            INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  title         VARCHAR(300)    NOT NULL,
  slug          VARCHAR(320)    NOT NULL UNIQUE,
  excerpt       TEXT,
  body          LONGTEXT        NOT NULL,
  image_path    VARCHAR(300),
  tag           VARCHAR(80),
  status        ENUM('draft','published') NOT NULL DEFAULT 'draft',
  author_id     INT UNSIGNED    NOT NULL,
  published_at  DATETIME,
  created_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_status       (status),
  INDEX idx_published_at (published_at),
  CONSTRAINT fk_article_author FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ─────────────────────────────────────────────
-- PARTNERS
-- ─────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS partners (
  id            INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  partner_name  VARCHAR(200)    NOT NULL,
  partner_type  VARCHAR(80)                             -- e.g. NGO Partner, Government Partner
    DEFAULT 'Partner Organization',
  description   TEXT,
  quote_text    TEXT,
  quote_author  VARCHAR(150),
  quote_role    VARCHAR(150),
  youtube_url   VARCHAR(300),
  sort_order    SMALLINT        NOT NULL DEFAULT 0,
  is_active     TINYINT(1)      NOT NULL DEFAULT 1,
  created_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_sort (sort_order)
) ENGINE=InnoDB;

-- ─────────────────────────────────────────────
-- TEAM MEMBERS
-- ─────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS team_members (
  id            INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  full_name     VARCHAR(150)    NOT NULL,
  role_title    VARCHAR(150)    NOT NULL,
  bio           TEXT,
  photo_path    VARCHAR(300),
  initials      CHAR(3),
  badge_color   ENUM('orange','blue','teal') NOT NULL DEFAULT 'blue',
  is_featured   TINYINT(1)      NOT NULL DEFAULT 0,    -- featured = Executive Director card
  sort_order    SMALLINT        NOT NULL DEFAULT 0,
  is_active     TINYINT(1)      NOT NULL DEFAULT 1,
  created_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_sort     (sort_order),
  INDEX idx_featured (is_featured)
) ENGINE=InnoDB;

-- ─────────────────────────────────────────────
-- SESSION LOG — optional audit trail
-- ─────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS login_log (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id     INT UNSIGNED,
  email_tried VARCHAR(180) NOT NULL,
  ip_address  VARCHAR(45),
  user_agent  VARCHAR(300),
  success     TINYINT(1)   NOT NULL DEFAULT 0,
  logged_at   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_user    (user_id),
  INDEX idx_success (success),
  CONSTRAINT fk_log_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ═══════════════════════════════════════════════════════════
-- SEED DATA
-- ═══════════════════════════════════════════════════════════

-- Default admin account
-- Password: Admin@ACF2024  (change immediately after first login)
INSERT INTO users (full_name, email, password_hash, role) VALUES (
  'ACF Administrator',
  'admin@acfphils.org',
  '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- bcrypt of "Admin@ACF2024"
  'admin'
);

-- Seed existing team members
INSERT INTO team_members (full_name, role_title, bio, photo_path, initials, badge_color, is_featured, sort_order) VALUES
  ('Arnold Tarrobago', 'Executive Director',
   'Leading ACF\'s strategic direction and programs since its founding, Arnold champions participatory governance and the empowerment of marginalized communities across the Philippines.',
   'images/AT.jpg', 'AT', 'orange', 1, 1),
  ('Jordan Gutierrez',  'Program Coordinator', NULL, 'images/JG.jpg', 'JG', 'blue',   0, 2),
  ('Millie Gines',      'Program Coordinator', NULL, 'images/MG.jpg', 'MG', 'blue',   0, 3),
  ('Wilman Rebusta',    'Administrative Assistant', NULL, 'images/WR.jpg', 'WR', 'teal', 0, 4),
  ('Dhelma Victorio',   'Finance & Admin Officer', NULL, 'images/DV.jpg', 'DV', 'teal', 0, 5);

-- Seed existing partners
INSERT INTO partners (partner_name, partner_type, description, quote_text, quote_author, quote_role, youtube_url, sort_order) VALUES
  ('Akbayan Women', 'NGO Partner',
   'Supporting a socialist, feminist agenda and the formation of local women\'s groups. Together with ACF, they launched the Buklod Aral online organizing series during the pandemic.',
   'This pandemic we reinvented our partnership with ACF and explored online local organizing — the Buklod Aral series let grassroot women meet and discuss their personal issues alongside local and national concerns.',
   'Kit Melgar', 'Women Leader, Akbayan Women',
   'https://www.youtube.com/embed/3cT6Pgwg7og', 1),

  ('SIM-CARRD Inc.', 'Local Resource Partner',
   'A local resource partner focused on democratizing local governments in Mindanao through liberating education and participative methodology that elevates communities.',
   'ACF plays a major role in shaping democratic governance, empowered communities, and meaningful representation. SIM-CARRD will always support ACF\'s interventions in our communities. Long live ACF!',
   'Angie Katoh', 'SIM-CARRD Inc., Mindanao',
   'https://www.youtube.com/embed/AVJuomX1vhM', 2),

  ('Center for Youth Advocacy & Networking', 'Youth Organization',
   'Through organizing, webinars, and policy discussions, ACF and CYAN reached cities and provinces during the pandemic and bridged Filipino youth with international organizations for solidarity and learning.',
   'ACF helped us greatly in building the foundations of a strong youth movement — empowering student councils, committee-based youth, and young village leaders to organize toward a progressive agenda.',
   'Justine Balane', 'CYAN, Akbayan Youth',
   'https://www.youtube.com/embed/J3HsEn4jE1A', 3),

  ('Local Government — Cebu City', 'Government Partner',
   'ACF\'s capacity building program for local government officials anchors public service in participatory governance — building communities for the people, by the people, of the people.',
   'The people themselves are in the best position to articulate their needs. ACF taught us that the best approach will always be from the grassroots — through meaningful consultation and active citizenship.',
   'Alvin Dizon', 'Councilor, Cebu City',
   'https://www.youtube.com/embed/uOf_ML5xIJk', 4);

-- Seed sample news articles
INSERT INTO news_articles (title, slug, excerpt, body, image_path, tag, status, author_id, published_at) VALUES
  ('Empowering Gen Z Voters: ACF\'s Commitment to Strengthening Youth Participation in the 2025 Elections',
   'empowering-gen-z-voters-2025',
   'Generation Z voters are emerging as a formidable force in Philippine elections, significantly influencing the country\'s democratic landscape.',
   'Generation Z (Gen Z) voters are emerging as a formidable force in Philippine elections, significantly influencing the country\'s democratic landscape. ACF has been at the forefront of educating and empowering these first-time voters through community workshops and digital campaigns.',
   'images/genzvoters.jpg', 'Elections', 'published', 1, '2025-04-03 08:00:00'),

  ('Exposing Deceit: The Stop Scam Hubs Campaign\'s Fight Against Human Trafficking and Online Fraud',
   'exposing-deceit-stop-scam-hubs',
   'In November 2022, the Office of Senator Risa Hontiveros uncovered a harrowing human trafficking operation in Myanmar.',
   'In November 2022, the Office of Senator Risa Hontiveros (OSRH) uncovered a harrowing human trafficking operation in Myanmar. ACF has been actively supporting advocacy efforts to expose and combat these criminal networks.',
   'images/exposingdeceit.jpg', 'Official Reports', 'published', 1, '2024-07-17 09:00:00'),

  ('Voters Education post-Covid',
   'voters-education-post-covid',
   'IT\'S THE SYSTEM, STUPID! DESIGNING A SYSTEMIC APPROACH TO VOTERS\' EDUCATION IN THE PHILIPPINES',
   'A comprehensive policy paper examining how voters\' education must evolve after the disruptions of the Covid-19 pandemic, proposing a systemic approach that leverages digital tools while maintaining grassroots community engagement.',
   'images/voterseducation.jpg', 'Policy Papers', 'published', 1, '2021-04-23 08:00:00');
