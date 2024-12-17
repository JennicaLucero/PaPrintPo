@extends('layouts.web')

@section('title', 'Your Submissions')

@section('content')
@include('include.header')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="cart-container">
    <h1 class="section-title">Your Submissions</h1>

    @if(count($submissions) === 0)
        <div class="empty-cart-message">
            <p>Your folder is empty. <a href="{{ route('printing-services') }}" class="text-blue-500">Print Now</a></p>
        </div>
    @else
        @php
            // Group submissions by status
            $groupedSubmissions = $submissions->groupBy('status');
        @endphp

        @foreach($groupedSubmissions as $status => $group)
            <div class="status-group">
                <h2 class="status-title font-bold text-black-500 text-lg mb-4 mt-4">Status: {{ $status }}</h2>
                <div class="cart-items-container">
                    @foreach($group as $submission)
                        <div class="cart-item-card">
                            <h2 class="cart-item-name">{{ $submission->document_name }}</h2>
                            <p class="cart-item-total">Number of Copies: {{ $submission->quantity }}</p>
                            <p class="cart-item-price">Price: ₱{{ number_format($submission->price, 2) }}</p>

                            @if($submission->status === "Waiting for Approval")
                                <div class="button-container">
                                    <!-- Approve Button routes to the checkout page -->
                                    <a href="{{ route('fileCheckout.show', ['id' => $submission->id]) }}" class="update-button">Approve</a>

                                    <!-- Decline Button -->
                                    <form action="{{ route('submissions.decline', $submission->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="update-button">Decline</button>
                                    </form>
                                </div>
                            @elseif($submission->status === "Approved")
                                <p class="mt-4 status-message text-black-500 font-bold">Your order is ready.</p>
                            @else
                                <p class="mt-4 status-message text-black-500 font-bold">Waiting for price.</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
</body>
@include('include.footer')
@endsection
