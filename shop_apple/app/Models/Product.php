<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'ProductID',
        'ProductName',
        'ProductCategoryID',
        'Photo',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'ProductCategoryID');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'ProductID');
    }

    public function getPromotions()
    {
        return $this->hasMany(Promotion::class, 'GetX');
    }

    public function buyPromotions()
    {
        return $this->hasMany(Promotion::class, 'BuyX');
    }
}