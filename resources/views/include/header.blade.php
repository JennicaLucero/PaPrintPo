<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<script src="{{ asset('js/toggle-dropdown.js') }}"></script>

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
        
        <!-- Dropdown button with onclick for mobile -->
        <div class="dropdown">
            <button class="toggle-btn" onclick="toggleDropdown()">
                <i class="fas fa-print"></i> SERVICES
            </button>
            <!-- Dropdown items, hidden by default -->
            <div class="dropdown-items" id="dropdownItems">
                <a href="#">Printing Services</a>
                <a href="#">Design Assistance</a>
                <a href="#">Buy Printing Supplies</a>
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
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
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

    // Function to toggle the dropdown visibility for mobile and desktop
    function toggleDropdown() {
        const dropdownItems = document.getElementById('dropdownItems');
        dropdownItems.classList.toggle('active');
    }

    // Ensure dropdown stays open when clicking on services button on mobile
    document.addEventListener('click', function(event) {
        const dropdownItems = document.getElementById('dropdownItems');
        const dropdownButton = document.querySelector('.toggle-btn');
        
        // Close the dropdown if clicked outside of the dropdown button
        if (!dropdownButton.contains(event.target) && !dropdownItems.contains(event.target)) {
            dropdownItems.classList.remove('active');
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
            transform: translateY(-50%);
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
            text-align: left;
            width: 100%; /* Take full width for dropdown on mobile */
        }

        .dropdown-items.active {
            display: block;
        }

        /* Ensure dropdown button is properly aligned */
        .dropdown .toggle-btn {
            width: 100%;
            text-align: center;
            padding: 10px;
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
