<?php

namespace App\Http\Controllers;

use App\Models\PrintingSupply;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show the cart page
    public function index()
    {
        $cartItems = UserCart::with('supply')->where('user_id', Auth::id())->get();

        return view('cart.index', compact('cartItems'));
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
