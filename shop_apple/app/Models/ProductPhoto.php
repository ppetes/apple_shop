<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPhoto extends Model
{
    use HasFactory;

    protected $table = 'product_photos';

    protected $fillable = [
        'ProductID',
        'VariantID',
        'photo_path'
    ];

    /**
     * Define relationship to Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    /**
     * Define relationship to ProductVariant model.
     */
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'VariantID');
    }
}
