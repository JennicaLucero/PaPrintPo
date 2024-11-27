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
                        <a href="#"><i class="fas fa-print"></i> Printing Services</a>
                        <a href="#"><i class="fas fa-pencil-alt"></i> Design Assistance</a>
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
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest

            @auth
                <a href="{{ route('cart.index') }}" class="relative">
                    <i class="fas fa-shopping-cart"></i> 
                    @if(session()->has('cart') && count(session('cart')) > 0)
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-2">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
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

    <style>
        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between; /* Align logo and hamburger */
            align-items: center;
            padding: 10px;
            position: relative;
        }

        /* Ensure the logo stays on the left */
        .header a {
            display: flex;
            align-items: center;
        }

        .nav {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        /* Mobile menu toggle styles */
        /* Mobile menu toggle styles */
@media (max-width: 768px) {
    .nav {
        display: none;
        flex-direction: column;
        width: 100%;
        align-items: center; /* Center align items */
    }

    .nav.active {
        display: flex;
    }

    .hamburger-menu {
        display: block;
        cursor: pointer;
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%); /* Position the hamburger in the middle */
    }

    .hamburger-menu i {
        font-size: 30px;
        color: #333;
    }

    /* Align the nav items vertically and center them */
    .nav a {
        padding: 15px;
        text-align: center;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px; /* Adjust font size for mobile */
    }

    .nav a i {
        margin-right: 8px; /* Add space between icon and text */
    }

    .dropdown-items {
        display: none;
        text-align: center;
        width: 230px; /* Set a fixed width or use auto to allow for content width */
        min-width: 200px; /* Set a minimum width to prevent dropdown from becoming too narrow */
    }

    .dropdown-items.active {
        display: block;
    }

    /* Ensure dropdown button is properly aligned */
    .dropdown .toggle-btn {
        width: 100%;
        text-align: center;
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

        /* Desktop: Dropdown shows on hover */
        @media (min-width: 769px) {
            .hamburger-menu {
                display: none;
            }

            .dropdown {
                position: relative;
            }

            .dropdown-items {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                background-color: white;
                border: 1px solid #ddd;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 200px;
                z-index: 100;
            }

            .dropdown:hover .dropdown-items {
                display: block;
            }

            .dropdown-items a {
                padding: 10px;
                text-decoration: none;
                color: #333;
            }

            .dropdown-items a:hover {
                background-color: #f4f4f4;
            }
        }
    </style>

