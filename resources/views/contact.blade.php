@extends('layouts.web')

@section('title', 'Contact Us')

@section('content')
@include('include.header')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-screen-lg px-4 py-12">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800">Get in Touch</h1>
            <p class="text-lg text-gray-500 mt-4">
                Feel free to reach out to us with your questions or concerns. We're here to help!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Send Us a Message</h2>
                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                        <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                        <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                        <textarea name="message" id="message" rows="5" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" required></textarea>
                    </div>
                    <div class="text-right">
                        @if(auth()->check())
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition">
                                Send
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition">
                                Log In to Send
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Contact Information</h2>
                <ul class="space-y-6 text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-500 text-xl mr-3"></i>
                        <span>Hernando, Laoag City, 2900 Ilocos Norte</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone text-blue-500 text-xl mr-3"></i>
                        <span>09754280499</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-blue-500 text-xl mr-3"></i>
                        <span>zeankyronclemente00@gmail.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock text-blue-500 text-xl mr-3"></i>
                        <span>Sun-Sat, 7 AM - 7 PM</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Message Sent!</h2>
            <p class="text-gray-600 mb-6">Thank you for contacting us. We'll get back to you soon!</p>
            <button id="closeModal" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition">
                Close
            </button>
        </div>
    </div>

    <script>
    $(document).ready(function () {
        $('#contactForm').on('submit', function (e) {
            e.preventDefault();

            $('#successModal').removeClass('hidden');
        });

        $('#closeModal').on('click', function () {

            $('#contactForm')[0].reset();

            // Hide the modal
            $('#successModal').addClass('hidden');

            //Go Back to Home
            window.location.href = "/";
        });
    });
</script>


@include('include.footer')
@endsection