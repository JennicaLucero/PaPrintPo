<?php

namespace App\Services;

use App\Models\UserCart;
use App\Models\Service;
use App\Models\PrintingSupply; // Add this if you are handling supplies
use Illuminate\Support\Facades\Auth;

class CartService
{
    // Function to add both services (documents) and supplies to the cart
    public function addItemToCart($item, $type, $fileName = null, $imagePath = null)
    {
        if (Auth::check()) {
            $userCart = UserCart::firstOrCreate(
                ['user_id' => Auth::id()],
                ['cart_items' => json_encode([])]
            );

            $cart = json_decode($userCart->cart_items, true);

            if ($type === 'service') {
                // Handle adding a service (document) to the cart
                $cart[$item->id] = [
                    'name' => $fileName,
                    'quantity' => $item->quantity,
                    'price' => 0, // Adjust pricing logic as necessary
                    'image' => $imagePath, // You can set a default image for the service
                ];
            } elseif ($type === 'supply') {
                // Handle adding a supply to the cart
                $cart[$item->id] = [
                    'name' => $item->name, // Assuming 'name' is a field in the supply model
                    'quantity' => $item->quantity,
                    'price' => $item->price, // Assuming 'price' is a field in the supply model
                    'image' => $item->image, // Assuming supplies have images
                ];
            }

            // Update the cart in the database
            $userCart->update(['cart_items' => json_encode($cart)]);
        }
    }

    public function removeItemFromCart($itemId)
    {
        if (Auth::check()) {
            $userCart = UserCart::where('user_id', Auth::id())->first();
            $cart = $userCart ? json_decode($userCart->cart_items, true) : [];

            if (isset($cart[$itemId])) {
                // Remove the item from the cart
                unset($cart[$itemId]);

                // Remove the service or supply from its respective table
                $service = Service::find($itemId);
                if ($service) {
                    $service->delete(); // Remove service
                }

                $supply = PrintingSupply::find($itemId);
                if ($supply) {
                    $supply->delete(); // Remove supply
                }

                // Update the cart in the database
                $userCart->update(['cart_items' => json_encode($cart)]);
            }
        }
    }

    public function getCart()
    {
        if (Auth::check()) {
            $userCart = UserCart::where('user_id', Auth::id())->first();
            return $userCart ? json_decode($userCart->cart_items, true) : [];
        }
        return [];
    }

    public function clearCart()
    {
        if (Auth::check()) {
            UserCart::where('user_id', Auth::id())->delete();
        }
    }
}
