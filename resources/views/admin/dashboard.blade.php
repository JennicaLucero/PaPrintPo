@extends('layouts.web')

@section('title', 'Dashboard')

@section('content')
@include('include.adminHeader')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="content">
    <div class="section">
        <div class="card">
            <h3>Total Users</h3>
            <p>{{ $userCount }}</p>
        </div>
        <div class="card">
            <h3>Total Services</h3>
            <p>{{ $serviceCount }}</p>
        </div>
        <div class="card">
            <h3>Total Orders</h3>
            <p>{{ $orderCount }}</p>
        </div>
        <div class="card">
            <h3>Contact Messages</h3>
            <p>{{ $contactCount }}</p>
        </div>
    </div>
</div>
</body>
@include('include.adminFooter')
@endsection