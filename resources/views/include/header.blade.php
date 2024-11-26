<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<script src="{{ asset('js/toggle-dropdown.js') }}"></script>

<<<<<<< HEAD
<div class="header flex justify-between items-center p-4 bg-white shadow-md">
    <a href="{{ route('home') }}" class="flex items-center">
        <img alt="PaPrint Po Logo" src="{{ asset('images/logo.png') }}" class="w-24 h-auto"/>
    </a>
    <div class="nav flex items-center space-x-4">
        <a href="{{ route('home') }}" class="text-sm md:text-base"><i class="fas fa-home"></i> HOME</a>
        
        <div class="dropdown relative">
            <button class="toggle-btn text-sm md:text-base"><i class="fas fa-print"></i> SERVICES</button>
            <div class="dropdown-items absolute hidden bg-white shadow-lg rounded-md w-48 py-2">
                <a href="#" class="block px-4 py-2">Printing Services</a>
                <a href="#" class="block px-4 py-2">Design Assistance</a>
                <a href="#" class="block px-4 py-2">Buy Printing Supplies</a>
            </div>
        </div>

        <a href="{{ route('pricing') }}" class="text-sm md:text-base"><i class="fas fa-tags"></i> PRICING</a>
        <a href="{{ route('contact') }}" class="text-sm md:text-base"><i class="fas fa-envelope"></i> CONTACT US</a>
        
        @guest
            <a href="{{ route('register') }}" class="text-sm md:text-base"><i class="fas fa-user-plus"></i> SIGN UP</a>
            <a href="{{ route('login') }}" class="text-sm md:text-base"><i class="fas fa-sign-in-alt"></i> LOG IN</a>
        @else
            <div class="dropdown relative">
                <button class="toggle-btn text-sm md:text-base"><i class="fas fa-user"></i> {{ Auth::user()->name }}</button>
                <div class="dropdown-items absolute hidden bg-white shadow-lg rounded-md w-48 py-2">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2">Profile</a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
=======
<div class="header">
    <a href="{{ route('home') }}">
    <img alt="PaPrint Po Logo" src="{{ asset('images/logo.png') }}" />
    </a>
    <div class="nav">
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> HOME</a>
    <div class="dropdown">
        <button class="toggle-btn"><i class="fas fa-print"></i> SERVICES</button>
        <div class="dropdown-items">
            <a href="#">Printing Services</a>
            <a href="#">Design Assistance</a>
            <a href="#">Buy Printing Supplies</a>
        </div>
    </div>
    <!-- <a href="#"><i class="fas fa-upload"></i> UPLOAD</a>
    <a href="#"><i class="fas fa-pencil-alt"></i> DESIGN ASSISTANCE</a> -->
    <a href="{{ route('pricing') }}"><i class="fas fa-tags"></i> PRICING</a>
    <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> CONTACT US</a>
    <!-- <a href="#"><i class="fas fa-user"></i> PROFILE</a> -->
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
>>>>>>> 04a69b39424d9f2e776174a76d4bb0f7a67dcccb
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>
<<<<<<< HEAD
</div>

<!-- Tailwind CSS & Custom Styles -->
<style>
    @media (max-width: 768px) {
        .nav {
            display: none;
        }
        
        .nav.active {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            position: absolute;
            top: 0;
            right: 0;
            background-color: white;
            width: 100%;
            padding: 1rem;
            z-index: 10;
        }
        
        .toggle-btn {
            font-size: 1.2rem;
        }
    }
</style>

<script>
    // Toggle mobile menu
    const toggleDropdown = document.querySelector('.toggle-btn');
    toggleDropdown.addEventListener('click', function () {
        const nav = document.querySelector('.nav');
        nav.classList.toggle('active');
    });
</script>
=======
</div>
>>>>>>> 04a69b39424d9f2e776174a76d4bb0f7a67dcccb
