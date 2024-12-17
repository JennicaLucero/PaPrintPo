@extends('layouts.web')

@section('title', 'Your Orders')

@section('content')
  @include('include.header')

  <div class="container mx-auto px-4 py-8 min-h-screen">
    <h1 class="text-3xl font-semibold text-center mb-6">Your Orders</h1>

    @if ($orders->isEmpty())
        <p class="text-center text-gray-500">You have no orders yet.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($orders as $order)
            <div class="card bg-white shadow-md rounded-lg overflow-hidden">
                <div class="card-header bg-gray-100 p-4">
                    <strong>Order #{{ $order->id }}</strong> 
                    | Status: <span class="badge bg-info text-blue-500">{{ $order->status }}</span>
                </div>
                <div class="card-body p-4">
                    <p><strong>Name:</strong> {{ $order->name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Phone:</strong> {{ $order->phone }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                    <p><strong>Total Price:</strong> ₱{{ number_format($order->total_price, 2) }}</p>
                    <h5 class="font-semibold mt-4">Order Items:</h5>
                    <ul class="list-disc pl-6">
                        @foreach ($order->items as $item)
                            <li>
                                {{ $item['supply']['name'] }} 
                                ({{ $item['quantity'] }} x ₱{{ number_format($item['supply']['price'], 2) }})
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer bg-gray-100 text-center text-sm text-gray-500 py-2">
                    <small>Placed on {{ $order->created_at->format('F d, Y - h:i A') }}</small>
                </div>
            </div>
            @endforeach
        </div>
    @endif
  </div>
</body>

  @include('include.footer')
@endsection
