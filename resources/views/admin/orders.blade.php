@extends('layouts.web')

@section('title', 'Customer Orders')

@section('content')
@include('include.adminHeader')

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="cart-container">
    <h1 class="section-title">Customer Orders</h1>
    @if(count($orders) === 0)
        <div class="empty-cart-message">
            <p>There are currently no customer orders. <a href="{{ route('admin.dashboard') }}" class="text-blue-500">Back to Dashboard</a></p>
        </div>
    @else
        @php
            // Group orders by status
            $groupedOrders = $orders->groupBy('status');
        @endphp

        @foreach($groupedOrders as $status => $group)
            <div class="status-group">
                <h2 class="status-title font-bold text-black-500 text-lg mb-4 mt-4">Status: {{ ucfirst($status) }}</h2>
                <div class="cart-items-container">
                    @foreach($group as $order)
                        <div class="cart-item-card">
                            <h2 class="cart-item-name">Order ID: #{{ $order->id }}</h2>
                            <p class="cart-item-price">Name: {{ $order->name }}</p>
                            <p class="cart-item-price">Email: {{ $order->email }}</p>
                            <p class="cart-item-price">Payment Method: {{ ucfirst($order->payment_method) }}</p>
                            <p class="cart-item-total">Total: ₱{{ number_format($order->total_price, 2) }}</p>
                            <p class="cart-item-status">Status: {{ ucfirst($order->status) }}</p>
                            <p class="cart-item-date">Created At: {{ $order->created_at->format('Y-m-d H:i') }}</p>
                             
                             

                            @if($order->status === "Pending")
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="update-button">Mark as Processed</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>

@include('include.adminFooter')
</body>
@endsection
