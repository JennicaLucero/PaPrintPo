@extends('layouts.web')

@section('title', 'Pricing')

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
             <form action="{{ route('cart.add', $supply->id) }}" method="POST">
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

<style>
    /* Container styling */
    .pricing-section {
        text-align: center;
        padding: 40px;
    }

    .section-title {
        font-size: 2rem;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }

    /* Grid container for the items */
    .supplies-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Card for each supply */
    .supply-card {
        width: 250px;
        background-color: #f9f9f9;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Image styling */
    .supply-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    /* Supply name and description */
    .supply-name {
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 10px;
    }

    .supply-description {
        font-size: 0.9rem;
        color: #555;
        line-height: 1.5;
    }

    /* Price styling */
    .supply-price {
        font-size: 1.1rem;
        font-weight: bold;
        color: indigo; /* Green for price */
        margin-top: 10px;
    }

    /* Button styling */
    .add-to-cart-button {
        background-color:indigo; /* Header color */
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 15px;
        cursor: pointer;
        text-align: center;
        display: inline-block;
        font: medium;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .add-to-cart-button:hover {
        background-color: indigo;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    /* Hover effect for cards */
    .supply-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }
</style>

@include('include.footer')

@endsection




