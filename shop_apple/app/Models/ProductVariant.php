<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';

    protected $fillable = [
        'VariantID',
        'Storage',
        'Color',
        'Price',
        'StockUnit',
        'ProductID',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'Price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    /**
     * Define relationship to ProductPhoto model.
     */
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'VariantID', 'Color');
    }
}