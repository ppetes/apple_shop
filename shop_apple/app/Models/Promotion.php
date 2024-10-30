<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';

    protected $fillable = [
        'PromotionID',
        'GetX',
        'BuyX',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'GetX');
    }

    public function buyProduct()
    {
        return $this->belongsTo(Product::class, 'BuyX');
    }
}