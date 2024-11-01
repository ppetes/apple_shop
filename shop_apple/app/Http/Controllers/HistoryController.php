<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function show()
    {
        $userId = Auth::id();

        // Fetch the invoice for the authenticated user
        $invoice = DB::table('invoices as i')
            ->join('invoice_details as id','i.OrderID','id.OrderID')
            ->join('product_variants as pr','id.VariantID','pr.VariantID')
            ->join('products as p','pr.ProductID','p.ProductID')
            ->where('OrderBy',$userId)    
            ->get();

        $groupedOrders = $invoice->groupBy('OrderID');

        return view('history.show', compact('invoice' ,'groupedOrders'));
    }
}
