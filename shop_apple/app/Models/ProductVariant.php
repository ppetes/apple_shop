<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $primaryKey = 'VariantID';

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'VariantID');
    }
}
