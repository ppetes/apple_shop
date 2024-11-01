<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    public function show($id) // Pass the OrderID as a parameter
    {
        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Fetch the invoice for the authenticated user
        $invoice = Invoice::where('OrderID', $id)
                          ->where('OrderBy', $userId)
                          ->with('details.product', 'details.variant')
                          ->first();

        // Check if the invoice exists
        if (!$invoice) {
            return redirect()->route('cart.index')->with('error', 'Invoice not found.');
        }

        return view('invoice.show', compact('invoice')); // Pass the invoice to the view
    }
}
