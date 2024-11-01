<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function show($id)
    {
        // Fetch the invoice for the authenticated user
        $invoice = Invoice::where('OrderID', $id) // Change 'id' to 'OrderID'
                          ->where('OrderBy', Auth::id())
                          ->with('details.product', 'details.variant')
                          ->first();

        // Check if the invoice exists
        if (!$invoice) {
            return redirect()->route('cart.index')->with('error', 'Invoice not found.');
        }

        return view('invoice.show', compact('invoice'));
    }
}
