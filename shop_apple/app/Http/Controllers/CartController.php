<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\InvoiceDetail; 

class CartController extends Controller
{
    public function show($id)
    {
        // Fetch the specific cart item for the authenticated user with associated product and variant data
        $cartItem = Cart::where('CartID', $id)
                        ->where('CustomerID', Auth::id())
                        ->with(['product.photos', 'variant'])
                        ->first();
    
        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }
    
        // Prepare an array of photo paths for the variants, if they exist
        $photoPaths = [];
        if ($cartItem->product && $cartItem->product->photos) {
            foreach ($cartItem->product->variants as $variant) {
                $photo = $cartItem->product->photos->where('VariantID', $variant->VariantID)->first();
                $photoPaths[$variant->VariantID] = $photo ? asset('storage/' . $photo->photo_path) : asset('default.jpg');
            }
        }
    
        // Set a default photo path if no variant-specific photo exists
        $defaultPhotoPath = $photoPaths[$cartItem->variant->VariantID] ?? asset('default.jpg');
    
        return view('cart.show', compact('cartItem', 'photoPaths', 'defaultPhotoPath'));
    }

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

            return redirect()->route('cart.index');
        }

        return redirect()->route('cart.index');
    }

    public function checkout()
{
    // Fetch the cart items for the authenticated user
    $cartItems = Cart::where('CustomerID', Auth::id())->with(['product', 'variant'])->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    // Calculate the total amount for the invoice
    $totalAmount = $cartItems->sum(function ($item) {
        $price = $item->variant ? $item->variant->Price : $item->product->Price; 
        $itemTotal = $item->Quantity * $price;
    
        // ตรวจสอบว่าราคาสูงกว่า 50,000 หรือไม่ และลด 5% หากเป็นเช่นนั้น
        return $itemTotal;
    });

    // Create a new invoice record
    $invoice = Invoice::create([
        'OrderBy' => Auth::id(),
        'Date' => now(),
        'TotalAmount' => $totalAmount > 50000 ? $totalAmount * 0.95 : $totalAmount,
    ]);

    // Debugging: Check if the invoice was created successfully
    if (!$invoice) {
        return redirect()->route('cart.index')->with('error', 'Failed to create invoice.');
    }

    // Log the created invoice ID
    \Log::info('Invoice created with ID: ' . $invoice->id);

    // Loop through each cart item to create corresponding invoice details
    foreach ($cartItems as $item) {
        $price = $item->variant ? $item->variant->Price : $item->product->Price;

        // Log the OrderID before creating InvoiceDetail
        \Log::info('Creating InvoiceDetail for OrderID: ' . $invoice->id);

        // Create invoice detail entry
        InvoiceDetail::create([
            'OrderID' => $invoice->id,
            'ProductID' => $item->ProductID,
            'VariantID' => $item->VariantID, // Ensure you're saving the VariantID
            'Quantity' => $item->Quantity,
            'Price' => $price,
        ]);
    }

    // Clear the user's cart after successful checkout
    Cart::where('CustomerID', Auth::id())->delete();

    // Redirect to the invoice show route with the OrderID
    return redirect()->route('invoice.show', ['id' => $invoice->id])->with('success', 'Checkout completed!');
}

    // Remove an item from the cart
    public function remove($cartId)
    {
        $cartItem = Cart::where('CartID', $cartId)->where('CustomerID', Auth::id())->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('error', 'Item removed from cart!');
        }

        return redirect()->route('cart.index')->with('success', 'Item not found.');
    }

   
}
