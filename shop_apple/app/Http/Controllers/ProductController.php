<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['photos', 'variants'])->findOrFail($id);
        
        // Prepare an array of photo paths for each variant
        $photoPaths = [];
        foreach ($product->variants as $variant) {
            $photo = $product->photos->where('VariantID', $variant->VariantID)->first();
            $photoPaths[$variant->VariantID] = $photo ? asset('storage/' . $photo->photo_path) : asset('default.jpg');
        }
    
        $defaultPhotoPath = $photoPaths[$product->variants->first()->VariantID] ?? asset('default.jpg');
        
        return view('product.show', compact('product', 'defaultPhotoPath', 'photoPaths'));
    }
    
    public function showIphoneProducts()
    {
        // // Retrieve products with category ID 1
        $products = Product::where('ProductCategoryID', 1)->with(['photos', 'variants'])->get();
        

        return view('product.iphone', compact('products'));
    }
    
}
