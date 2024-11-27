<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintingSupply; // Ensure this model exists
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $supply = PrintingSupply::findOrFail($id);

        $cart = session()->get('cart', []);

        // Check if the item is already in the cart and update the quantity, or add a new item
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $supply->name,
                'price' => $supply->price,
                'quantity' => 1,
                'image' => $supply->image, // Add the image URL or path to the cart item
            ];
        }

        // Store the updated cart in the session
        session()->put('cart', $cart);

        // Redirect to the cart page with a success message
        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }

    public function checkout()
    {
        // Clear the cart session after checkout
        session()->forget('cart');
        
        // Redirect to the cart page with a success message
        return redirect()->route('cart.index')->with('success', 'Checkout successful!');
    }
    public function removeFromCart($id)
{
    // Assuming $cart is stored in session or a similar mechanism
    $cart = session()->get('cart', []);

    // Remove the item from the cart
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.index');  // Redirect back to the cart page
}
public function update(Request $request, $id)
{
    // Get the cart from the session
    $cart = Session::get('cart', []);

    // Check if the item exists in the cart
    if (isset($cart[$id])) {
        // Update the quantity of the item
        $quantity = $request->input('quantity', 1);  // Default to 1 if no quantity is provided
        $cart[$id]['quantity'] = $quantity;

        // Recalculate the total for that item
        $cart[$id]['total'] = $cart[$id]['price'] * $quantity;

        // Save the updated cart back to the session
        Session::put('cart', $cart);
    }

    // Redirect back to the cart page with a success message
    return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
}
}
