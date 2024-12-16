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
            <a href="{{ route('printing-services') }}" class="card-link">Go to Printing Services &rarr;</a>
          </div>
          
          <div class="service-card">
            <img src="images/design.png" alt="Design Assistance Image" />
            <h3>Design Assistance</h3>
            <p>Need help with layout or design? Our team is here to assist with creating professional documents, brochures, invitations, and more.</p>
            <a href="{{ route('home') }}" class="card-link">Go to Design Assistance &rarr;</a>
          </div>
      
          <div class="service-card">
            <img src="images/ink.png" alt="Delivery or Pickup Image" />
            <h3>Buy Printing Supplies</h3>
            <p>Purchase essential printing supplies such as paper, ink, and toner directly from our platform. Have them delivered to your doorstep anywhere from Laoag to Batac, or conveniently pick them up when it suits you.</p>
            <a href="{{ route('buy-printing-supplies') }}" class="card-link">Go to Printing Supplies &rarr;</a>
          </div>
            
          <div class="service-card">
            <img src="images/delivery.png" alt="Delivery or Pickup Image" />
            <h3>Delivery or Pickup</h3>
            <p>Choose to have your prints delivered to your location within Laoag to Batac or pick them up at your convenience.</p>
            <a href="{{ route('pricing') }}" class="card-link">Go to Pricing &rarr;</a>
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
    @include('include.footer')
@endsection