<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory; // Import the ProductCategory model
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Load products with their related category using 'ProductCategoryID' as the foreign key
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function index1()
    {
        // Load products with their related category using 'ProductCategoryID' as the foreign key
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}