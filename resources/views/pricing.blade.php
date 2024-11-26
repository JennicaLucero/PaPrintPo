@extends('layouts.web')

@section('title', 'Pricing')

@section('content')
  @include('include.header')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container mx-auto max-w-screen-lg px-4 py-12">
        <div class="container mx-auto py-12">
            <!-- Page Title and Description -->
            <div class="text-center mb-10">
<<<<<<< HEAD
                <h1 class="text-4xl font-bold text-gray-900">Our Printing Pricing</h1>
                <p class="text-lg text-gray-600 mt-4">We offer flexible pricing to help you get the most out of our services.</p>
=======
                <h1 class="text-4xl font-bold text-gray-900">Our Pricing Plans</h1>
                <p class="text-lg text-gray-600 mt-4">Choose the plan that best fits your needs. We offer flexible pricing to help you get the most out of our services.</p>
>>>>>>> 04a69b39424d9f2e776174a76d4bb0f7a67dcccb
            </div>

            <!-- Pricing Cards Section -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Basic Plan -->
                <div class="bg-white shadow-lg rounded-lg p-6">
<<<<<<< HEAD
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Document Printing</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">Php 1 - 9<span class="text-lg">/Page</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                      <li>✔ Black & White Printing</li>
                      <li>✔ Color Printing</li>
                      <li>✔ Double-sided (Duplex)</li>
                      <li>✔ Basic Binding (Stapling)</li>
=======
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Basic Plan</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">$19.99<span class="text-lg">/month</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                        <li>✔ Basic Printing Services</li>
                        <li>✔ Access to Design Assistance</li>
                        <li>✔ Email Support</li>
                        <li>✔ 5 Designs per month</li>
>>>>>>> 04a69b39424d9f2e776174a76d4bb0f7a67dcccb
                    </ul>
                    <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
                </div>

                <!-- Standard Plan -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-4 border-indigo-600">
<<<<<<< HEAD
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Photo Printing</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">Php 10 - 25<span class="text-lg">/Piece</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                      <li>✔ High-Quality Photo Printing</li>
                      <li>✔ Glossy or Matte Finish</li>
                      <li>✔ Custom Sizes Available</li>
                      
=======
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Standard Plan</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">$49.99<span class="text-lg">/month</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                        <li>✔ All Basic Plan Features</li>
                        <li>✔ Advanced Printing Options</li>
                        <li>✔ Priority Support</li>
                        <li>✔ 10 Designs per month</li>
>>>>>>> 04a69b39424d9f2e776174a76d4bb0f7a67dcccb
                    </ul>
                    <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
                </div>

                <!-- Premium Plan -->
                <div class="bg-white shadow-lg rounded-lg p-6">
<<<<<<< HEAD
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Design & Custom Prints</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">Php 5 - 300<span class="text-lg">/Piece</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                      <li>✔ Business Cards</li>
                      <li>✔ Flyers & Brochures</li>
                      <li>✔ Posters (Small, Medium, Large)</li>
                      <li>✔ Invitations (Weddings, Events)</li>
=======
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Premium Plan</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">$99.99<span class="text-lg">/month</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                        <li>✔ All Standard Plan Features</li>
                        <li>✔ Unlimited Printing Services</li>
                        <li>✔ Dedicated Account Manager</li>
                        <li>✔ 25 Designs per month</li>
>>>>>>> 04a69b39424d9f2e776174a76d4bb0f7a67dcccb
                    </ul>
                    <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
                </div>
            </div>
        </div>
</div>
</body>
@include('include.footer')
@endsection