@extends('layouts.web') <!-- Assuming you have a base layout -->

@section('title', 'Contact Us') <!-- Set the page title -->

@section('content')
@include('include.header')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container mx-auto max-w-screen-lg px-4 py-12">
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Contact Us</h1>
        <p class="text-lg text-gray-600 mt-4">
            We'd love to hear from you! Reach out to us with any questions, feedback, or inquiries.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Contact Form -->
        <div class="bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Send Us a Message</h2>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                    <textarea name="message" id="message" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">Send</button>
                </div>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Contact Information</h2>
            <ul class="space-y-4 text-gray-600">
                <li><i class="fas fa-map-marker-alt text-blue-500"></i> Address: 1234 Street Name, City, Country</li>
                <li><i class="fas fa-phone text-blue-500"></i> Phone: +1 (123) 456-7890</li>
                <li><i class="fas fa-envelope text-blue-500"></i> Email: contact@example.com</li>
                <li><i class="fas fa-clock text-blue-500"></i> Business Hours: Mon-Fri, 9 AM - 6 PM</li>
            </ul>
        </div>
    </div>
</div>
</div>
</body>
@include('include.footer')
@endsection
