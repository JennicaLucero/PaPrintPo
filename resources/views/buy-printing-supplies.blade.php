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
            <form action="{{ route('cart.add', ['supplyId' => $supply->id]) }}" method="POST">
              @csrf
              <button type="submit" class="add-to-cart-button">
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

@include('include.footer')

@endsection




