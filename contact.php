<?php
require_once 'nav-footer.php';
$currentPage = 'contact';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullName = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    $honeypot = $_POST['website'] ?? ''; // Spam protection
    
    // Validate honeypot (should be empty)
    if (!empty($honeypot)) {
        $errorMessage = "Spam detected. Please try again.";
    }
    // Validate required fields
    elseif (empty($fullName) || empty($email) || empty($message)) {
        $errorMessage = "Please fill in all required fields.";
    }
    // Validate email format
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    }
    else {
        // Email configuration
        $to = "info@acfphilippines.org"; // Change to your actual email
        $emailSubject = "Contact Form: $subject";
        $emailBody = "Name: $fullName\n";
        $emailBody .= "Email: $email\n";
        $emailBody .= "Phone: $phone\n";
        $emailBody .= "Subject: $subject\n\n";
        $emailBody .= "Message:\n$message";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Try to send email
        if (mail($to, $emailSubject, $emailBody, $headers)) {
            $successMessage = "Thank you, $fullName! Your message has been sent successfully.";
            // Clear form after success
            $_POST = array();
        } else {
            $errorMessage = "Failed to send message. Please try again later or email us directly.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - Active Citizenship Foundation Philippines</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="nav-footer.css"/>

  <style>
    /* Custom styles for Contact Page */
    .contact-hero {
      background: #1E1660;
      color: white;
      padding: 80px 0;
      text-align: center;
    }
    .contact-hero h1 { font-family: 'Fredoka One', cursive; font-size: 3rem; margin-bottom: 10px; }
    
    .contact-wrapper {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 50px;
      margin-top: 50px;
    }

    .contact-info-box {
      background: #f9f9f9;
      padding: 30px;
      border-radius: 10px;
      border: 1px solid #eee;
    }
    .contact-info-item { margin-bottom: 20px; }
    .contact-info-item h4 { color: #1E1660; margin-bottom: 5px; font-family: 'Fredoka One', cursive; }
    .contact-info-item p { color: #555; }

    .contact-form {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: #333; }
    .form-group input, .form-group textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-family: 'Nunito', sans-serif;
      font-size: 1rem;
    }
    .form-group input:focus, .form-group textarea:focus {
      outline: none;
      border-color: #FF8C00;
    }
    
    .btn-submit {
      background: #FF8C00;
      color: white;
      border: none;
      padding: 15px 30px;
      font-size: 1.1rem;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      width: 100%;
      transition: background 0.3s;
    }
    .btn-submit:hover { background: #e07b00; }

    /* Success/Error Message Styles */
    .success-message {
      background: #d4edda;
      color: #155724;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
      border: 1px solid #c3e6cb;
    }
    
    .error-message {
      background: #f8d7da;
      color: #721c24;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
      border: 1px solid #f5c6cb;
    }
    
    .honeypot { display: none; }
  </style>
</head>
<body>

  <?php acf_nav($currentPage); ?>

  <main>

    <!-- HERO -->
    <section class="contact-hero">
      <div class="container">
        <h1>Get Involved</h1>
        <p>Have questions or want to partner with us? We'd love to hear from you.</p>
      </div>
    </section>

    <!-- Wave Separator -->
    <div class="wave" style="background:#1E1660;">
      <svg viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,40 C360,0 1080,72 1440,24 L1440,72 L0,72 Z" fill="#ffffff"/>
      </svg>
    </div>

    <!-- CONTACT SECTION -->
    <section class="section" id="contact">
      <div class="container">
        <div class="contact-wrapper">
          
          <!-- Contact Info -->
          <div class="contact-info-box reveal">
            <h3 style="font-family: 'Fredoka One'; color: #1E1660; margin-bottom: 20px;">Contact Information</h3>
            
            <div class="contact-info-item">
              <h4>📍 Address</h4>
              <p>123 Democracy Avenue, Quezon City<br>Philippines</p>
            </div>

            <div class="contact-info-item">
              <h4>📞 Phone</h4>
              <p>+63 2 8123 4567</p>
            </div>

            <div class="contact-info-item">
              <h4>✉ Email</h4>
              <p>info@acfphilippines.org</p>
            </div>

            <div class="contact-info-item">
              <h4>🕒 Office Hours</h4>
              <p>Mon - Fri: 9:00 AM - 5:00 PM</p>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="contact-form reveal reveal-delay-1">
            <h3 style="font-family: 'Fredoka One'; color: #1E1660; margin-bottom: 20px;">Send us a Message</h3>
            
            <?php if ($successMessage): ?>
              <div class="success-message">
                <?php echo $successMessage; ?>
              </div>
            <?php endif; ?>
            
            <?php if ($errorMessage): ?>
              <div class="error-message">
                <?php echo $errorMessage; ?>
              </div>
            <?php endif; ?>
            
            <form action="contact.php" method="POST">
              <!-- Spam Protection (Honeypot) -->
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
