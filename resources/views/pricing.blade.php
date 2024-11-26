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
            
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-900">Our Printing Pricing</h1>
                <p class="text-lg text-gray-600 mt-4">We offer flexible pricing to help you get the most out of our services.</p>
            </div>

          
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Document Printing</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">Php 1 - 9<span class="text-lg">/Page</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                      <li>✔ Black & White Printing</li>
                      <li>✔ Color Printing</li>
                      <li>✔ Double-sided (Duplex)</li>
                      <li>✔ Basic Binding (Stapling)</li>
                    </ul>
                    <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
                </div>

                <!-- Standard Plan -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-4 border-indigo-600">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Photo Printing</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">Php 10 - 25<span class="text-lg">/Piece</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                      <li>✔ High-Quality Photo Printing</li>
                      <li>✔ Glossy or Matte Finish</li>
                      <li>✔ Custom Sizes Available</li>
                      
                    </ul>
                    <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
                </div>

                <!-- Premium Plan -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Design & Custom Prints</h2>
                    <p class="text-3xl font-bold text-indigo-600 mb-6">Php 5 - 300<span class="text-lg">/Piece</span></p>
                    <ul class="text-gray-600 mb-6 space-y-2">
                      <li>✔ Business Cards</li>
                      <li>✔ Flyers & Brochures</li>
                      <li>✔ Posters (Small, Medium, Large)</li>
                      <li>✔ Invitations (Weddings, Events)</li>
                    </ul>
                    <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
                </div>
            </div>
        </div>
</div>
</body>
@include('include.footer')
@endsection