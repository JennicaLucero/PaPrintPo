@extends('layouts.web')

@section('title', 'PaPrintPo')

@section('content')
  @include('include.header')
  <div class="container">
    <div class="main-content">
      <h1>Your Go-To Printing</h1>
      <h2>and Design Service</h2>
      <h2 id="text">in LAOAG - BATAC</h2>
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
        
    </div> 
</div>
@include('include.footer')
@endsection