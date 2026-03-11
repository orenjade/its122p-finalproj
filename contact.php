<?php
require_once 'nav-footer.php';
$currentPage = 'contact';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    $honeypot = $_POST['website'] ?? '';
    
    if (!empty($honeypot)) {
        $errorMessage = "Spam detected. Please try again.";
    } elseif (empty($fullName) || empty($email) || empty($message)) {
        $errorMessage = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } else {
        $to = "info@acfphilippines.org";
        $emailSubject = "Contact Form: $subject";
        $emailBody = "Name: $fullName\nEmail: $email\nPhone: $phone\nSubject: $subject\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\nX-Mailer: PHP/" . phpversion();
        
        if (mail($to, $emailSubject, $emailBody, $headers)) {
            $successMessage = "Thank you, $fullName! Your message has been sent successfully.";
            $_POST = array();
        } else {
            $errorMessage = "Failed to send message. Please try again later.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us — ACF Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>
  <link rel="stylesheet" href="Identity.css"/>

  <style>
    /* Contact Page Specific Styles */
    .contact-wrapper {
      display: grid;
      grid-template-columns: 1fr 1.3fr;
      gap: 60px;
      align-items: start;
    }

    .contact-info-box {
      background: #f9f9f9;
      padding: 40px;
      border-radius: 15px;
      border: 1px solid #eee;
    }

    .contact-info-item {
      display: flex;
      align-items: flex-start;
      gap: 15px;
      margin-bottom: 25px;
    }

    .contact-icon {
      font-size: 1.5rem;
      flex-shrink: 0;
    }

    .contact-info-item h4 {
      color: #1E1660;
      font-family: 'Fredoka One', cursive;
      margin-bottom: 5px;
    }

    .contact-info-item p {
      color: #555;
      margin: 0;
    }

    .contact-form-box {
      background: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #333;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 14px 16px;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-family: 'Nunito', sans-serif;
      font-size: 1rem;
      transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: #FF8C00;
    }

    .btn-submit {
      background: #FF8C00;
      color: white;
      border: none;
      padding: 16px 32px;
      font-size: 1.1rem;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 700;
      width: 100%;
      transition: background 0.3s;
      font-family: 'Fredoka One', cursive;
    }

    .btn-submit:hover {
      background: #e07b00;
    }

    .success-message {
      background: #d4edda;
      color: #155724;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #c3e6cb;
    }

    .error-message {
      background: #f8d7da;
      color: #721c24;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #f5c6cb;
    }

    .honeypot {
      display: none;
    }

    @media (max-width: 900px) {
      .contact-wrapper {
        grid-template-columns: 1fr;
        gap: 40px;
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
        <div class="id-hero-tag"><span class="id-dot"></span> Get in Touch</div>
        <h1 class="id-hero-title">Get <em>Involved</em></h1>
        <p class="id-hero-sub">Have questions or want to partner with us? We'd love to hear from you.</p>
      </div>
    </section>

    <!-- Wave: navy → white -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,24 C480,72 960,0 1440,48 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- ═══════ CONTACT SECTION ═══════ -->
    <section class="id-section id-section--white" id="contact">
      <div class="id-container">

        <div class="contact-wrapper">
          
          <!-- Contact Info -->
          <div class="contact-info-box reveal">
            <div class="chip chip-o">Contact Information</div>
            <h2 class="id-section-title">Get in Touch</h2>
            
            <div class="contact-info-item">
              <div class="contact-icon">📍</div>
              <div>
                <h4>Address</h4>
                <p>123 Democracy Avenue, Quezon City<br>Philippines</p>
              </div>
            </div>

            <div class="contact-info-item">
              <div class="contact-icon">📞</div>
              <div>
                <h4>Phone</h4>
                <p>+63 2 8123 4567</p>
              </div>
            </div>

            <div class="contact-info-item">
              <div class="contact-icon">✉</div>
              <div>
                <h4>Email</h4>
                <p>info@acfphilippines.org</p>
              </div>
            </div>

            <div class="contact-info-item">
              <div class="contact-icon">🕒</div>
              <div>
                <h4>Office Hours</h4>
                <p>Mon - Fri: 9:00 AM - 5:00 PM</p>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="contact-form-box reveal reveal-delay-1">
            <div class="chip chip-o">Send a Message</div>
            <h2 class="id-section-title">Send us a Message</h2>
            
            <?php if ($successMessage): ?>
              <div class="success-message">✓ <?php echo $successMessage; ?></div>
            <?php endif; ?>
            
            <?php if ($errorMessage): ?>
              <div class="error-message">✕ <?php echo $errorMessage; ?></div>
            <?php endif; ?>
            
            <form action="contact.php" method="POST">
              <!-- Spam Protection -->
              <input type="text" name="website" class="honeypot" tabindex="-1" autocomplete="off">
              
              <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" required placeholder="Juan Dela Cruz">
              </div>

              <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required placeholder="juan@example.com">
              </div>

              <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="tel" id="phone" name="phone" required placeholder="+63 912 345 6789">
              </div>

              <div class="form-group">
                <label for="subject">Subject *</label>
                <input type="text" id="subject" name="subject" required placeholder="Inquiry about programs">
              </div>

              <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" rows="5" required placeholder="How can we help you?"></textarea>
              </div>

              <button type="submit" class="btn-submit">Send Message</button>
            </form>
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
