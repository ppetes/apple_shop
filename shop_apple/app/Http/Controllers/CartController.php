<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display the cart
    public function index()
    {
        $cartItems = Cart::where('CustomerID', Auth::id())->with(['product', 'variant'])->get();
        return view('cart.show', compact('cartItems'));
    }

    // Add a product to the cart
    public function add(Request $request)
    {
        $request->validate([
            'ProductID' => 'required|exists:products,ProductID',
            'VariantID' => 'nullable|exists:product_variants,VariantID',
            'Quantity' => 'required|integer|min:1'
        ]);

        $productId = $request->ProductID;
        $variantId = $request->VariantID;
        $quantity = $request->Quantity;

        // Check if the item already exists in the cart
        $cartItem = Cart::where('CustomerID', Auth::id())
                        ->where('ProductID', $productId)
                        ->where('VariantID', $variantId)
                        ->first();

        if ($cartItem) {
            // If item exists, update the quantity
            $cartItem->Quantity += $quantity;
            $cartItem->save();
        } else {
            // Create a new cart item
            Cart::create([
                'CustomerID' => Auth::id(),
                'ProductID' => $productId,
                'VariantID' => $variantId,
                'Quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }

    // Update quantity of an item in the cart
    public function update(Request $request, $cartId)
    {
        $request->validate([
            'Quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('CartID', $cartId)->where('CustomerID', Auth::id())->first();

        if ($cartItem) {
            $cartItem->Quantity = $request->Quantity;
            $cartItem->save();

            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
        }

        return redirect()->route('cart.index')->with('error', 'Item not found.');
    }

    // Remove an item from the cart
    public function remove($cartId)
    {
        $cartItem = Cart::where('CartID', $cartId)->where('CustomerID', Auth::id())->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
        }

        return redirect()->route('cart.index')->with('error', 'Item not found.');
    }
}
