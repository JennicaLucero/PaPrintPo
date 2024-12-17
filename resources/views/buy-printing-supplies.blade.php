@extends('layouts.web')

@section('title', 'Printing Supplies')

@section('content')
@include('include.header')

<div class="pricing-section">
    <div class="section-title">Our Supplies</div>
    <div class="supplies-container">
        @foreach($supplies as $supply)
        <div class="supply-card">
            <img src="{{ asset($supply->image) }}" alt="{{ $supply->name }} image" class="supply-image">
            <h2 class="supply-name">{{ $supply->name }}</h2>
            <p class="supply-description">{{ $supply->description }}</p>
            <p class="supply-price">Php{{ number_format($supply->price, 2) }}</p>

            <!-- Show Add to Cart only for authenticated users -->
            @auth
            <form action="{{ route('cart.add', ['supplyId' => $supply->id]) }}" method="POST" id="addToCartForm{{ $supply->id }}">
              @csrf
              <button type="submit" class="add-to-cart-button"
                onclick="trackAddToCart('{{ $supply->id }}', '{{ $supply->name }}', {{ $supply->price }})">
                Add to Cart
             </button>
            </form>
            @endauth

            <!-- Show a login prompt for guests -->
            @guest
            <a href="{{ route('login') }}" class="add-to-cart-button">
                Log in to Add to Cart
            </a>
            @endguest
        </div>
        @endforeach
    </div>
</div>

<script>
    function trackAddToCart(itemId, itemName, itemPrice) {
        gtag('event', 'add_to_cart', {
            currency: 'PHP', // Replace with your currency
            value: itemPrice,
            items: [
                {
                    item_id: itemId,
                    item_name: itemName,
                    quantity: 1 // Assuming the default quantity is 1
                }
            ]
        });
    }
</script>

@include('include.footer')

@endsection



