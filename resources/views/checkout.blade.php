@extends('layouts.web')

@section('title', 'Checkout')

@section('content')
@include('include.header')

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="container mx-auto max-w-screen-lg px-4 py-12">
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Checkout</h1>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto">
            <form action="{{ route('placeOrder') }}" method="POST">
            @csrf
            <!-- User Information -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Name:
                </label>
                <!-- <h2>User Information</h2> -->
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full border py-2 px-3 rounded text-gray-700" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Email:
                </label>
                <input type="text" name="email" value="{{ old('email', $user->email) }}"
                class="w-full border py-2 px-3 rounded text-gray-700" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Phone:
                </label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                class="w-full border py-2 px-3 rounded text-gray-700" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Address:
                </label>
                <input type="text" name="address" value="{{ old('address', $user->address) }}"
                class="w-full border py-2 px-3 rounded text-gray-700" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Payment Method
                </label>
                <select id="payment_method" name="payment_method" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="Cash">Cash</option>
                    <option value="Gcash">GCash</option>
                </select>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Your Order</h2>
                @foreach($cartItems as $item)
                <p class="text-gray-700 mt-2">{{ $item->supply->name }} x {{ $item->quantity }} - 
                ₱{{ number_format($item->supply->price * $item->quantity, 2) }}</p>
                @endforeach
                <h2 class="text-xl font-semibold text-gray-800">Total: ₱{{ number_format($totalPrice, 2) }}</h3>
            </div>
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('buy-printing-supplies') }}" class="btn-back">Go Back</a>
                <button type="submit" class="btn-continue">Continue</button>
            </div>
        </form>
        </div>
    </div>
</div>

@include('include.footer')
@endsection




