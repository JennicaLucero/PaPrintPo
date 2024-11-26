@extends('layouts.web')

@section('title', 'PaPrintPo')

@section('content')
  @include('include.header')
  <div class="container">
    <div class="main-content">
      <h1>Your Go-To Printing</h1>
      <h2 class="separated-heading">and Design Service</h2>
      <h2 class="separated-heading" id="text">in LAOAG - BATAC</h2>
      <p>Delivered to your doorstep or ready for pick-up!</p>
      <a class="button" href="#services">GET STARTED</a>

      <div class="icons">
        <img src="images/low.png" alt="Print, Design, and Upload Icons" />
      </div>
    </div>

    <div id="services" class="services-section">
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
                <img src="images/user2.png" alt="User 2" class="client-photo">
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

        <!-- About Our Partners Section -->
  <div class="partners-section">
    <h2 class="section-title">Our Trusted Partners</h2>
    
    <div class="partners-container">
        
        <!-- Partner 1 -->
        <div class="partner-card">
            <img src="images/epson-logo.png" alt="Epson Logo" class="partner-logo">
            <div class="partner-info">
                <h3 class="partner-name">Epson</h3>
                <p class="partner-description">Epson is a global leader in imaging and printing solutions. Their cutting-edge technology powers our high-quality printing services, ensuring vibrant and reliable results for all our customers.</p>
            </div>
        </div>
        
        <!-- Partner 2 -->
        <div class="partner-card">
            <img src="images/canon-logo.png" alt="Canon Logo" class="partner-logo">
            <div class="partner-info">
                <h3 class="partner-name">Canon</h3>
                <p class="partner-description">Canon provides advanced printing hardware that supports our commitment to excellence. Their innovative products help us deliver seamless and efficient services.</p>
            </div>
        </div>
        
        <!-- Partner 3 -->
        <div class="partner-card">
            <img src="images/hp-logo.png" alt="HP Logo" class="partner-logo">
            <div class="partner-info">
                <h3 class="partner-name">HP</h3>
                <p class="partner-description">HP is a trusted name in printing technology. Their reliable equipment enhances our platform's ability to meet diverse customer needs with precision and speed.</p>
            </div>
        </div>
        
        <!-- Partner 4 -->
        <div class="partner-card">
            <img src="images/brother-logo.png" alt="Brother Logo" class="partner-logo">
            <div class="partner-info">
                <h3 class="partner-name">Brother</h3>
                <p class="partner-description">Brother's durable and versatile printing solutions contribute to our goal of providing top-notch printing and design services to the community.</p>
            </div>
        </div>
        
    </div>
</div>

        
    </div> 
  </div>

  <style>
    
    .partners-section {
      text-align: center;
      padding: 40px;
  }
  
  .section-title {
      font-size: 2rem;
      margin-bottom: 20px;
  }
  
  .partners-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
  }
  
  .partner-card {
      width: 250px;
      background-color: #f9f9f9;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
  }
  
  .partner-logo {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%; /* Circular images */
      margin-bottom: 15px;
  }
  
  .partner-name {
      font-size: 1.2rem;
      font-weight: bold;
      margin-top: 10px;
  }
  
  .partner-description {
      font-size: 0.9rem;
      color: #555;
      line-height: 1.5;
  }

  .partner-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
  }
  
    /* Mobile Responsive Styles */
    @media (max-width: 768px) {
        .main-content h1 {
            font-size: 2.5rem;
        }

        .main-content h2 {
            font-size: 1.8rem;
        }

        .main-content p {
            font-size: 1rem;
        }

        .button {
            font-size: 1rem;
            padding: 10px 20px;
        }

        .services-container {
            flex-direction: column;
            align-items: center;
        }

        .service-card {
            width: 90%;
            margin-bottom: 20px;
        }

        .testimonials-container {
            flex-direction: column;
            align-items: center;
        }

        .testimonial-card {
            width: 80%;
            margin-bottom: 20px;
        }

        /* Adjust icon for mobile view */
        .icons img {
            width: 80%;
        }

        /* Ensure there's enough space between the H2 elements in mobile view */
        .separated-heading {
            margin-top: 1px; /* Adds spacing on top */
            margin-bottom: 1px; /* Adds spacing below */
        }
        
        /* More specific styling for the second H2 to prevent collision */
        #text {
            margin-top: 1px; /* Additional spacing for the second H2 element */
        }
      
    }
  </style>

  @include('include.footer')
@endsection