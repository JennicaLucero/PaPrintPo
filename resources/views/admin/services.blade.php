@extends('layouts.web')

@section('title', 'Services')

@section('content')
@include('include.adminHeader')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function showModal(message) {
            const modal = document.getElementById('errorModal');
            const modalMessage = document.getElementById('modalMessage');
            modalMessage.textContent = message;
            modal.classList.remove('hidden');
        }

        function hideModal() {
            const modal = document.getElementById('errorModal');
            modal.classList.add('hidden');
        }

        function validatePriceAndSend(event, priceInput) {
            if (priceInput.value.trim() === '') {
                event.preventDefault();
                showModal('Please set a price before sending for approval.');
            }
        }
    </script>
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
                    <button type="submit" class="update-button w-full py-2 px-4 rounded" style="background-color: #ADD8E6; color: #4B0082;">Set Price</button>
                </form>

                <!-- Send for Approval Form -->
                <form action="{{ route('admin.services.send', $service->id) }}" method="POST" onsubmit="validatePriceAndSend(event, this.previousElementSibling.querySelector('input[name=price]'))">
                    @csrf
                    <button type="submit" class="update-button w-full py-2 px-4 rounded" style="background-color: #ADD8E6; color: #4B0082;">Send for Approval</button>
                </form>
            </div>
        @endforeach
    </div>
    @endif
</div>

<!-- ERROR MESSAGE -->
<div id="errorModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden" style="text-align: center;">
    <div class="bg-white rounded-lg p-6 max-w-sm w-full">
        <h2 class="text-lg font-semibold mb-4">Error</h2>
        <p id="modalMessage" class="text-gray-700"></p>
        <div class="mt-4">
            <button onclick="hideModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Close</button>

        </div>
    </div>
</div>

</body>
@include('include.adminFooter')
@endsection