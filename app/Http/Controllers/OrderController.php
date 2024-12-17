<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Show the checkout page
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = UserCart::where('user_id', Auth::id())->with('supply')->get(); // Retrieve cart from database
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->supply->price * $item->quantity;
        });

        return view('checkout', compact('user', 'cartItems', 'totalPrice'));
    }

    // Save the order
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'payment_method' => 'required|string|in:Cash on Delivery,Gcash',
        ]);

        // Fetch cart items from the user_carts table
        $cartItems = UserCart::where('user_id', Auth::id())->with('supply')->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->supply->price * $item->quantity;
        });

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'items' => $cartItems->toArray(), // You might want to serialize the cart items
            'total_price' => $totalPrice,
            'status' => 'Pending',
        ]);

        // After the order is placed, clear the user's cart
        UserCart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
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
        $order->status = 'Processed'; // Or any other status you need
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order status updated successfully.');
    }
// In OrderController.php
public function yourOrders()
{
    $user = Auth::user();
    $orders = Order::where('user_id', Auth::id())->latest()->get();

    return view('orders.index', compact('user', 'orders'));
}

    
   
    


}
