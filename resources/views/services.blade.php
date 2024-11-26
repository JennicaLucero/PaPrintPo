@extends(layouts.web)

@section('title', 'Pricing')

@section('content')
<!DOCTYPE html>
<body>
<div class="container mx-auto py-12">
    <!-- Page Title and Description -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-900">Our Pricing Plans</h1>
        <p class="text-lg text-gray-600 mt-4">Choose the plan that best fits your needs. We offer flexible pricing to help you get the most out of our services.</p>
    </div>

    <!-- Pricing Cards Section -->
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        <!-- Basic Plan -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Basic Plan</h2>
            <p class="text-3xl font-bold text-indigo-600 mb-6">$19.99<span class="text-lg">/month</span></p>
            <ul class="text-gray-600 mb-6 space-y-2">
                <li>✔ Basic Printing Services</li>
                <li>✔ Access to Design Assistance</li>
                <li>✔ Email Support</li>
                <li>✔ 5 Designs per month</li>
            </ul>
            <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
        </div>

        <!-- Standard Plan -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-4 border-indigo-600">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Standard Plan</h2>
            <p class="text-3xl font-bold text-indigo-600 mb-6">$49.99<span class="text-lg">/month</span></p>
            <ul class="text-gray-600 mb-6 space-y-2">
                <li>✔ All Basic Plan Features</li>
                <li>✔ Advanced Printing Options</li>
                <li>✔ Priority Support</li>
                <li>✔ 10 Designs per month</li>
            </ul>
            <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
        </div>

        <!-- Premium Plan -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Premium Plan</h2>
            <p class="text-3xl font-bold text-indigo-600 mb-6">$99.99<span class="text-lg">/month</span></p>
            <ul class="text-gray-600 mb-6 space-y-2">
                <li>✔ All Standard Plan Features</li>
                <li>✔ Unlimited Printing Services</li>
                <li>✔ Dedicated Account Manager</li>
                <li>✔ 25 Designs per month</li>
            </ul>
            <a href="/contact" class="w-full block text-center bg-indigo-600 text-white py-2 rounded-md font-medium hover:bg-indigo-700 transition">Get Started</a>
        </div>
    </div>
</div>
</body>
</html>
@endsection