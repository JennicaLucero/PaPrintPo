<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    // Show the checkout page
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = UserCart::where('user_id', Auth::id())->with('supply')->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->supply->price * $item->quantity;
        });

        return view('checkout', compact('user', 'cartItems', 'totalPrice'));
    }

    // Save the order and initiate GCash payment
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'payment_method' => 'required|string|in:Cash on Delivery,Gcash',
        ]);

        $cartItems = UserCart::where('user_id', Auth::id())->with('supply')->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->supply->price * $item->quantity;
        });

        if ($request->payment_method === 'Gcash') {
            $client = new Client();
            $response = $client->post('https://api.paymongo.com/v1/sources', [
                'auth' => [config('services.paymongo.secret_key'), ''],
                'json' => [
                    'data' => [
                        'attributes' => [
                            'amount' => $totalPrice * 100,
                            'currency' => 'PHP',
                            'type' => 'gcash',
                            'redirect' => [
                                'success' => route('payment.success'),
                                'failed' => route('payment.failed'),
                            ],
                        ],
                    ],
                ],
            ]);

            $sourceData = json_decode($response->getBody(), true);

            $order = Order::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'payment_method' => 'Gcash',
                'payment_status' => 'Pending',
                'payment_source_id' => $sourceData['data']['id'],
                'payment_redirect_url' => $sourceData['data']['attributes']['redirect']['checkout_url'],
                'items' => $cartItems->toArray(),
                'total_price' => $totalPrice,
                'status' => 'Pending',
            ]);

            UserCart::where('user_id', Auth::id())->delete();

            return redirect($sourceData['data']['attributes']['redirect']['checkout_url']);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => 'Cash on Delivery',
            'items' => $cartItems->toArray(),
            'total_price' => $totalPrice,
            'status' => 'Pending',
        ]);

        UserCart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    // Handle successful payment
    public function paymentSuccess()
    {
        $order = Order::where('user_id', Auth::id())
            ->where('payment_status', 'Pending')
            ->latest()
            ->first();

        if ($order) {
            $order->payment_status = 'Paid';
            $order->status = 'Processing';
            $order->save();
        }

        return redirect()->route('orders.index')->with('success', 'Payment successful! Your order is being processed.');
    }

    // Handle failed payment
    public function paymentFailed()
    {
        return redirect()->route('checkout')->with('error', 'Payment failed. Please try again.');
    }

    // Admin page to view all orders
    public function adminOrders()
    {
        $orders = Order::latest()->get();
        return view('admin.orders', compact('orders'));
    }

    // Update order status (for admin)
    public function update(Request $request, Order $order)
    {
        $order->status = 'Processed';
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order status updated successfully.');
    }

    // View user's orders
    public function yourOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('orders.index', compact('user', 'orders'));
    }
}
