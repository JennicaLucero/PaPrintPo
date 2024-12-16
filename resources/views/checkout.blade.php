@extends('layouts.web')

@section('title', 'Checkout')

@section('content')
@include('include.header')

<div class="checkout-container">
    <h1 class="section-title">Checkout</h1>

    <!-- User Information -->
    <form action="{{ route('place.order') }}" method="POST">
        @csrf
        <div class="user-info">
            <h2>User Information</h2>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

            <label>Phone:</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required>

            <label>Address:</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}" required>
        </div>

        <!-- Payment Form -->
        <div class="payment-form">
            <h2>Payment Method</h2>
            <select name="payment_method" required>
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Gcash">Gcash</option>
            </select>
        </div>

        <!-- Cart Items -->
        <div class="cart-items-summary">
            <h2>Your Order</h2>
            @foreach($cartItems as $item)
            <p>{{ $item->supply->name }} x {{ $item->quantity }} - 
            ₱{{ number_format($item->supply->price * $item->quantity, 2) }}</p>
            @endforeach
            <h3>Total: ₱{{ number_format($totalPrice, 2) }}</h3>
        </div>

        <!-- Buttons -->
        <div class="checkout-buttons">
            <a href="{{ route('buy-printing-supplies') }}" class="btn-back">Go Back</a>
            <button type="submit" class="btn-continue">Continue</button>
        </div>
    </form>
</div>

@include('include.footer')
@endsection
