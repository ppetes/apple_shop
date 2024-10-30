<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['photo_path'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'VariantID');
    }
}
