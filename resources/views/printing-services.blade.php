@extends('layouts.web')

@section('title', 'Printing Services')

@section('content')
@include('include.header')

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="container mx-auto max-w-screen-lg px-4 py-12">
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Printing Services</h1>
            <p class="text-lg text-gray-600 mt-4">
                Fill in the form below and upload your file for our high-quality printing services.
            </p>
        </div> 

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Document Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="document_name">
                        Document Name
                    </label>
                    <input type="text" name="document_name" id="document_name" class="w-full border py-2 px-3 rounded text-gray-700" required>
                </div>
                <!-- Service Type -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="service-type">
                        Service Type
                    </label>
                    <select id="service-type" name="service_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <!-- <option>Select a Service</option> -->
                        <!-- Options -->
                        <option value="" disabled selected>Select a Service</option>
                        <option value="document-printing">Document Printing</option>
                        <option value="photo-printing">Photo Printing</option>
                        <option value="custom-design">Custom Design Printing</option>
                    </select>
                </div>

                <!-- File Upload -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="file-upload">
                        Upload File
                    </label>
                    <input type="file" id="file-upload" name="file" class="w-full border py-2 px-3 rounded text-gray-700" required>
                </div>

                <!-- Number of Copies -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="copies">
                        Number of Copies
                    </label>
                    <input type="number" id="copies" name="quantity" placeholder="Enter the number of copies" class="w-full border py-2 px-3 rounded text-gray-700" required>
                </div>

                <!-- Comments/Instructions -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="comments">
                        Comments/Instructions
                    </label>
                    <textarea id="comments" name="comments" placeholder="Provide any additional details or special instructions" class="w-full border py-2 px-3 rounded text-gray-700"></textarea>
                </div>

                <!-- Links and Button -->
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <a href="{{ route('pricing') }}" class="text-blue-500 underline">Check Prices</a>
                        <p class="text-sm text-gray-600">Note: Prices may vary.</p>
                    </div>
                    <!-- Conditional Button Logic -->
                    @if(auth()->check())
                        <!-- Show "Add to Cart" button if user is authenticated -->
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    @else
                        <!-- Show "Login" button if user is not authenticated -->
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Log In to Add to Cart
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@include('include.footer')
@endsection


