@extends('layouts.web')

@section('title', 'Cart')

@section('content')
@include('include.header')

<div class="cart-container">
    <h1 class="section-title">Your Cart</h1>

    @if(count($cartItems) === 0)
        <div class="empty-cart-message">
            <p>Your cart is empty. <a href="{{ route('buy-printing-supplies') }}" class="text-blue-500">Shop Now</a></p>
        </div>
    @else
        <div class="cart-items-container">
        @foreach($cartItems as $cartItem)
            <div class="cart-item-card">
                <img src="{{ asset($cartItem->supply->image) }}" alt="image" class="cart-item-image">
                <h2 class="cart-item-name">{{ $cartItem->supply->name }}</h2>
                
                    <form action="{{ route('cart.update', $cartItem->id) }}" method="POST" class="quantity-form">
                    @csrf
                    @method('PUT')
                    <div class="cart-item-quantity">
                        <label for="quantity-{{ $cartItem->id }}" class="sr-only">Quantity</label>
                        <input type="number" id="quantity-{{ $cartItem->id }}" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="quantity-input">
                    </div>
                    <p class="cart-item-price">₱{{ number_format($cartItem->supply->price, 2) }}</p>
                    <p class="cart-item-total">Total: ₱{{ number_format($cartItem->supply->price * $cartItem->quantity, 2) }}</p>

                    <!-- Remove button for each item -->
                    <button type="submit" class="update-button">Update</button>
                </form>

                <!-- Remove button -->
                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
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

            <a href="{{ route('checkout') }}" class="checkout-button"
                onclick="trackCheckoutEvent()">
                Proceed to Checkout
            </a>

        </div>
    @endif
</div>

<script>
    function trackCheckoutEvent() {
        // Collect cart item data
        const cartItems = [
            @foreach($cartItems as $cartItem)
            {
                item_id: "{{ $cartItem->supply->id }}",
                item_name: "{{ $cartItem->supply->name }}",
                price: {{ $cartItem->supply->price }},
                quantity: {{ $cartItem->quantity }}
            },
            @endforeach
        ];

        // Send the event to Google Analytics
        gtag('event', 'begin_checkout', {
            currency: 'PHP', // Replace with your currency
            value: {{ $cartItems->sum(fn($item) => $item->supply->price * $item->quantity) }}, // Total cart value
            items: cartItems
        });
    }
</script>

@include('include.footer')
@endsection
