<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaPrint Po</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    
    <!-- JavaScript for Toggle -->
    <script src="{{ asset('js/toggle-dropdown.js') }}"></script>
</head>
<body>
    <div class="header">
        <!-- Logo stays on the left -->
        <a href="{{ route('home') }}">
            <img alt="PaPrint Po Logo" src="{{ asset('images/logo.png') }}" />
        </a>

        <!-- Hamburger Menu Button on the Right -->
        <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </div>

        <div class="nav" id="navMenu">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> HOME</a>
            
            <!-- Services Dropdown, similar to Profile Dropdown -->
            <div class="dropdown" id="toggleServicesDropdown">
                <button class="toggle-btn" >
                    <i class="fas fa-print"></i>SERVICES</button>
                    <div class="dropdown-items" id="servicesDropdownItems">
                        <a href="{{ route('printing-services') }}"><i class="fas fa-print"></i> Printing Services</a>
                        <a href="{{ route('buy-printing-supplies') }}"><i class="fas fa-box"></i> Buy Printing Supplies</a>
                    </div>
            </div>
            
            <a href="{{ route('pricing') }}"><i class="fas fa-tags"></i> PRICING</a>
            <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> CONTACT US</a>

            @guest
                <!-- When user is not logged in -->
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> SIGN UP</a>
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> LOG IN</a>
            @else
                <!-- When user is logged in -->
                <div class="dropdown" id="toggleDropdown">
                    <button class="toggle-btn"><i class="fas fa-user"></i> {{ Auth::user()->name }}</button>
                    <div class="dropdown-items">
                        <a href="{{ route('profile.edit') }}"><i class="fas fa-user-circle"></i>Profile</a>
                        <a href="{{route('home')  }}"><i class="fas fa-clipboard-list"></i>Orders</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest

            @auth
                <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i>
                @auth
                    @php
                        $cartCount = App\Models\UserCart::where('user_id', Auth::id())->count();
                    @endphp
                    @if ($cartCount > 0)
                        <span>
                            {{ $cartCount }}
                        </span>
                    @endif
                @endauth
  
                </a>
                <a href="{{ route('submissions') }}"><i class="fas fa-folder"></i>
                @auth
                    @php
                        $waitingCount = App\Models\Service::where('status', 'Waiting for Approval')->count();
                    @endphp
                    @if ($waitingCount > 0)
                        <span>
                            {{ $waitingCount }}
                        </span>
                    @endif
                @endauth
                </a>
            @endauth
        </div>
    </div>

    <script>
        // Function to toggle mobile menu and remove hamburger button when clicked
        function toggleMobileMenu() {
            const navMenu = document.getElementById('navMenu');
            const hamburgerMenu = document.getElementById('hamburgerMenu');
            
            navMenu.classList.toggle('active');
            hamburgerMenu.style.display = navMenu.classList.contains('active') ? 'none' : 'block'; // Hide hamburger on open
        }

        // Function to toggle the services dropdown visibility for mobile and desktop
        function toggleServicesDropdown() {
            const servicesDropdownItems = document.getElementById('servicesDropdownItems');
            servicesDropdownItems.classList.toggle('active');
        }

        // Ensure services dropdown stays open when clicking on services button on mobile
        document.addEventListener('click', function(event) {
            const servicesDropdownItems = document.getElementById('servicesDropdownItems');
            const servicesDropdownButton = document.querySelector('#toggleServicesDropdown .toggle-btn');
            
            // Close the dropdown if clicked outside of the services dropdown button and items
            if (!servicesDropdownButton.contains(event.target) && !servicesDropdownItems.contains(event.target)) {
                servicesDropdownItems.classList.remove('active');
            }
        });
    </script>

