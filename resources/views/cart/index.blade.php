@extends('layouts.web')

@section('title', 'Your Cart')

@section('content')
@include('include.header')

<div class="cart-container">
    <h1 class="section-title">Your Cart</h1>

    @if(empty($cart))
        <div class="empty-cart-message">
            <p>Your cart is empty. <a href="{{ route('buy-printing-supplies') }}" class="text-blue-500">Shop Now</a></p>
        </div>
    @else
        <div class="cart-items-container">
            @foreach($cart as $id => $item)
            <div class="cart-item-card">
                <img src="{{ asset($item['image']) }}" alt="image" class="cart-item-image">
                <h2 class="cart-item-name">{{ $item['name'] }}</h2>
                <form action="{{ route('cart.update', $id) }}" method="POST" class="quantity-form">
                    @csrf
                    @method('PUT')
                    <div class="cart-item-quantity">
                        <label for="quantity-{{ $id }}" class="sr-only">Quantity</label>
                        <input type="number" id="quantity-{{ $id }}" name="quantity" value="{{ $item['quantity'] }}" min="1" class="quantity-input">
                    </div>
                    <p class="cart-item-price">₱{{ number_format($item['price'], 2) }}</p>
                    <p class="cart-item-total">Total: ₱{{ number_format($item['price'] * $item['quantity'], 2) }}</p>

                    <!-- Remove button for each item -->
                    <button type="submit" class="update-button">Update</button>
                </form>

                <!-- Remove button -->
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-button">Remove</button>
                </form>
            </div>
            @endforeach
        </div>

        <div class="button-container">
            <!-- Back button -->
            <a href="{{ route('buy-printing-supplies') }}" class="back-button">
                Back 
            </a>

            <!-- Checkout button -->
            <form action="{{ route('checkout') }}" method="POST" class="checkout-form">
                @csrf
                <button type="submit" class="checkout-button">
                    Checkout
                </button>
            </form>
        </div>
    @endif
</div>

<style>
    /* Container styling */
    .cart-container {
        text-align: center;
        padding: 40px;
    }

    /* Section title */
    .section-title {
        font-size: 2rem;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }

    /* Empty cart message */
    .empty-cart-message {
        font-size: 1.1rem;
        color: #555;
    }

    /* Grid container for the cart items */
    .cart-items-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Card for each cart item */
    .cart-item-card {
        width: 250px;
        background-color: #f9f9f9;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Item image styling */
    .cart-item-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    /* Item name and description */
    .cart-item-name {
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 10px;
    }

    /* Price and total styling */
    .cart-item-price, .cart-item-total {
        font-size: 1.1rem;
        font-weight: bold;
        color: indigo;
        margin-top: 10px;
    }

    .cart-item-total {
        font-weight: normal;
    }

    /* Input field for quantity */
    .quantity-form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
    }

    .quantity-input {
        width: 60px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
        font-size: 1rem;
    }

    /* Button container */
    .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    /* Back button */
    .back-button {
        background-color: #f0f0f0;
        color: indigo;
        padding: 10px 28px;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
        border: 2px solid #ccc;
    }

    .back-button:hover {
        background-color: gray;
        transform: scale(1.05);
        border-color: #bbb;
    }

    /* Remove button */
    .remove-button {
        background-color: #ff4c4c;
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        border: none;
        margin-top: 10px;
    }

    .remove-button:hover {
        background-color: #e53939;
    }

    /* Update button */
    .update-button {
        background-color: lightblue; /* Green color */
        color: indigo;
        padding: 8px 12px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .update-button:hover {
        background-color: lightblue; /* Darker green */
        transform: scale(1.05);
    }

    /* Checkout button */
    .checkout-button {
        background-color: #4CAF50; /* Green color */
        color: white;
        padding: 12px 24px;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .checkout-button:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    /* Hover effect for item cards */
    .cart-item-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }
</style>

@include('include.footer')

@endsection
