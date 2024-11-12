<!DOCTYPE html>
<html>
<head>
  <title>PaPrint Po</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>

<body>
  <div class="container">
    <div class="header">
      <a href="#">
        <img alt="PaPrint Po Logo" src="images/logo.png" />
      </a>
      <div class="nav">
        <a href="#"><i class="fas fa-home"></i> HOME</a>
        <a href="#"><i class="fas fa-print"></i> SERVICES</a>
        <a href="#"><i class="fas fa-upload"></i> UPLOAD</a>
        <a href="#"><i class="fas fa-pencil-alt"></i> DESIGN ASSISTANCE</a>
        <a href="#"><i class="fas fa-tags"></i> PRICING</a>
        <a href="#"><i class="fas fa-envelope"></i> CONTACT US</a>
      </div>      
    </div>
    <div class="main-content">
      <h1>Your Go-To Printing</h1>
      <h2>and Design Service</h2>
      <h2 id="text">in LAOAG - BATAC</h2>
      <p>Delivered to your doorstep or ready for pick-up!</p>
      <a class="button" href="{{ route('register') }}">GET STARTED</a>

      <div class="icons">
        <img src="images/low.png" alt="Print, Design, and Upload Icons" />
      </div>
    </div>

    <div class="services-section">
        <h2 class="section-title">Our Services</h2>
        <div class="services-container">
          
          <div class="service-card">
            <img src="images/printer.png" alt="Printing Services Image" />
            <h3>Printing Services</h3>
            <p>Upload your files, choose your print settings (size, color, etc.), and get high quality prints for school, work, or personal use.</p>
            <a href="upload.html" class="card-link">Go to Printing Services &rarr;</a>
          </div>
          
          <div class="service-card">
            <img src="images/design.png" alt="Design Assistance Image" />
            <h3>Design Assistance</h3>
            <p>Need help with layout or design? Our team is here to assist with creating professional documents, brochures, invitations, and more.</p>
            <a href="design-assistance.html" class="card-link">Go to Design Assistance &rarr;</a>
          </div>
      
          <div class="service-card">
            <img src="images/delivery.png" alt="Delivery or Pickup Image" />
            <h3>Delivery or Pickup</h3>
            <p>Choose to have your prints delivered to your location within Laoag to Batac or pick them up at your convenience.</p>
            <a href="pricing.html" class="card-link">Go to Pricing &rarr;</a>
          </div>
          
        </div>
      </div>

      <!-- Testimonials Section -->
    <div class="testimonials-section">
        <h2 class="section-title">What Our Clients Say</h2>
    
        <div class="testimonials-container">
            
            <div class="testimonial-card">
                <img src="images/user1.jpg" alt="User 1" class="client-photo">
                <p class="testimonial-text">"PaPrint Po exceeded my expectations! The prints were high-quality and the delivery was fast. Highly recommend!"</p>
                <h3 class="client-name">Eleina Bumanglag</h3>
            </div>
        
            <div class="testimonial-card">
                <img src="images/user2.jpg" alt="User 2" class="client-photo">
                <p class="testimonial-text">"The design assistance really helped me with my project. The team was professional and easy to work with!"</p>
                <h3 class="client-name">Jennica Lucero</h3>
            </div>
        
            <div class="testimonial-card">
                <img src="images/user3.jpg" alt="User 3" class="client-photo">
                <p class="testimonial-text">"I always rely on PaPrint Po for my printing needs. Their service is fast and reliable every time."</p>
                <h3 class="client-name">Zean Clemente</h3>
            </div>
        
            <div class="testimonial-card">
                <img src="images/user4.jpg" alt="User 4" class="client-photo">
                <p class="testimonial-text">"Very convenient service with friendly staff! I appreciate the attention to detail in their work."</p>
                <h3 class="client-name">Mike Bagayas</h3>
            </div>
        </div>
        
    </div>
  
    <!-- Footer Section -->
<footer class="footer-section">
    <div class="footer-container">
      <!-- Logo and Description -->
      <div class="footer-logo">
        <img src="images/logo.png" alt="PaPrint Po Logo">
        <p>Your go-to service for printing, design assistance, and delivery or pickup. Serving Laoag to Batac with top-notch quality and convenience.</p>
      </div>
  
      <!-- Quick Links -->
      <div class="footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Upload</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
  
      <!-- Contact Information -->
      <div class="footer-contact">
        <h4>Contact Us</h4>
        <p>Email: support@paprintpo.com</p>
        <p>Phone: +63 912 345 6789</p>
        <p>Address: Batac, Ilocos Norte</p>
      </div>
  
      <!-- Social Media Links -->
      <div class="footer-social">
        <h4>Follow Us</h4>
        <div class="social-icons">
            <a href="#" aria-label="Facebook" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
  
    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <p>&copy; 2024 PaPrint Po. All Rights Reserved.</p>
    </div>
  </footer>
  
      


</body>
</html>