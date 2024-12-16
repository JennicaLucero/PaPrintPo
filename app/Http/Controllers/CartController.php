<?php

namespace App\Http\Controllers;

use App\Models\PrintingSupply;
use App\Models\UserCart;
use App\Models\Order; // Assuming you have an Order model
use App\Models\OrderItem; // Assuming you have an OrderItem model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Show the cart page
    public function index()
    {
        // Fetch cart items for the logged-in user
        $cartItems = UserCart::with('supply')->where('user_id', Auth::id())->get();
    
        // Fetch the most recent order for the logged-in user, including order items
        $order = Order::with('orderItems')->where('user_id', Auth::id())->latest()->first();
    
        // Check if an order exists
        if ($order) {
            // You can now access the order's items using $order->orderItems
            $orderItems = $order->orderItems;
        } else {
            // If no order exists, set $orderItems to an empty collection or array
            $orderItems = collect();
        }
    
        // Return the view with cart items and order items (if any)
        return view('cart.index', compact('cartItems', 'order', 'orderItems'));
    }
    

    // Add supply to cart
    public function addToCart(Request $request, $supplyId)
    {
        $supply = PrintingSupply::findOrFail($supplyId);

        // Check if supply is already in the cart
        $cartItem = UserCart::where('user_id', Auth::id())->where('supply_id', $supplyId)->first();

        if ($cartItem) {
            // If it's already in the cart, update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item
            UserCart::create([
                'user_id' => Auth::id(),
                'supply_id' => $supplyId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'PrintingSupply added to cart.');
    }

    // Remove supply from cart
    public function removeFromCart($cartItemId)
    {
        $cartItem = UserCart::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'PrintingSupply removed from cart.');
    }

    // Update cart item quantity
    public function update(Request $request, $cartId)
    {
        // Validate the quantity (must be at least 1)
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the cart item by its ID and update the quantity
        $cartItem = UserCart::where('id', $cartId)
                            ->where('user_id', Auth::id()) // Ensure the user is the one updating
                            ->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save(); // Save the updated cart item
        }

        // Redirect back to the cart page
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

}
