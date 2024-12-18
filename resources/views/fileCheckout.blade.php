@extends('layouts.web')

@section('title', 'Printing Checkout')

@section('content')
@include('include.header')

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="container mx-auto max-w-screen-lg px-4 py-12">
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Printing Checkout</h1>
            <p class="text-lg text-gray-600 mt-4">
                Fill in the form below to finalize your printing transaction.
            </p>
        </div> 

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto">
            <!-- Service Information -->
            <div class="bg-blue-200 mb-6 text-center py-4">
                <h2 class="text-xl font-semibold text-gray-800">File Details</h2>
                <p class="text-gray-700 mt-2"><strong>Service Name:</strong> {{ $submission->document_name }}</p>
                <p class="text-gray-700"><strong>Description:</strong> {{ $submission->comments }}</p>
                <p class="text-gray-700"><strong>Price:</strong> {{ number_format($submission->price, 2) }} PHP</p>
            </div>
            <form action="{{ route('fileCheckout.store', ['id' => $submission->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="price" value="{{ $submission->price }}">
                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user_name">
                        Name
                    </label>
                    <input type="text" name="user_name" id="user_name" class="w-full border py-2 px-3 rounded text-gray-700"
                    value="{{ old('user_name', Auth::user()->name ?? '') }}" required>
                </div>
                <!-- Delivery or Pick-up -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="delivery_type">
                        Delivery Option
                    </label>
                    <select id="delivery_type" name="delivery_type" class="mb-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <!-- <option>Select Payment</option> -->
                        <!-- Options -->
                        <option value="" disabled selected>Select delivery option</option>
                        <option value="pick-up">Pick-up</option>
                        <option value="delivery">Delivery</option>
                    </select>
                    <!-- Address -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                        Address
                    </label>
                    <input type="text" name="address" id="address" class="w-full border py-2 px-3 rounded text-gray-700"
                    value="{{ old('address', Auth::user()->address ?? '') }}" required>
                </div>
                <!-- Phone Number -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Phone Number
                    </label>
                    <input type="text" name="phone" id="phone" class="w-full border py-2 px-3 rounded text-gray-700"
                    value="{{ old('number', Auth::user()->phone ?? '') }}" required>
                </div>
                <!-- Payment Type -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="payment_type">
                        Payment Option
                    </label>
                    <select id="payment_type" name="payment_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <!-- <option>Select Payment</option> -->
                        <!-- Options -->
                        <option value="" disabled selected>Select your mode of payment</option>
                        <option value="Cash">Cash</option>
                        <option value="Gcash">GCash</option>
                    </select>
                </div>
</div>
                <!-- Links and Button -->
                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('include.footer')
@endsection