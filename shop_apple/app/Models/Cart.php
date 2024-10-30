<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'CartID',
        'ProductID',
        'Quantity',
        'CustomerID',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'CustomerID');
    }
}