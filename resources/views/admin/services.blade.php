@extends('layouts.web')

@section('title', 'Services')

@section('content')
@include('include.adminHeader')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="cart-container">
    <h1 class="section-title">Pending Services</h1>
    @if(count($services) === 0)
        <div class="empty-cart-message">
            <p>There is currently no pending services. <a href="{{ route('admin.dashboard') }}" class="text-blue-500">Back to Dashboard</a></p>
        </div>
    @else
        <div class="cart-items-container">
        @foreach($services as $service)
            <div class="cart-item-card">
                <h2 class="cart-item-name">{{ $service->document_name }}</h2>
                <p class="cart-item-price">Status: {{ $service->status }}</p>
                <p class="cart-item-total">Number of Copies: {{ $service->quantity }}</p>
                <p>Instructions: {{ $service->comments }}</p>
                <p class="cart-item-price">Price: ₱{{ number_format($service->price, 2) }}</p>

                <!-- Set Price Form -->
                <form action="{{ route('admin.services.price', $service->id) }}" method="POST">
                    @csrf
                    <input type="number" name="price" placeholder="Price" min="1" class="w-full border py-2 px-3 rounded text-gray-700 mt-4 mb-4" required>
                    <button type="submit" class="update-button">Set Price</button>
                </form>

                <form action="{{ route('admin.services.send', $service->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="update-button">Send for Approval</button>
                </form>
            </div>
        @endforeach
    </div>
    @endif
</div>
</body>
@include('include.adminFooter')
@endsection