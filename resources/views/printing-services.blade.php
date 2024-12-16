@extends('layouts.web')

@section('title', 'Checkout')

@section('content')
@include('include.header')

<div class="container max-w-lg p-5 my-5 bg-white rounded shadow">
    <h1 class="text-center display-4 mb-5">Checkout</h1>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Cart Items -->
    <div class="list-group mb-4">
        @foreach($cartItems as $cartItem)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <p>{{ $cartItem->supply->name }} (x{{ $cartItem->quantity }}) - 
                    ${{ number_format($cartItem->supply->price, 2) }}</p>
            </div>
        @endforeach
    </div>

    <hr>

    <!-- Total Amount -->
    <div class="text-right mb-5">
        <p class="h4"><strong>Total: ${{ number_format($totalAmount, 2) }}</strong></p>
    </div>

    <!-- Checkout Form -->
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="payment_method" class="font-weight-bold">Payment Method</label>
            <select id="payment_method" name="payment_method" class="form-control" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-4">
            Complete Checkout
        </button>
    </form>
</div>

@include('include.footer')
@endsection
