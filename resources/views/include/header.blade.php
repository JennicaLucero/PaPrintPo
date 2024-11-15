<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<script src="{{ asset('js/toggle-dropdown.js') }}"></script>

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
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>
</div>