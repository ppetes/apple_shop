<?php

// app/Models/Cart.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'CartID';

    protected $fillable = [
        'ProductID',
        'CustomerID',
        'VariantID',
        'Quantity',
        'selected',
    ];
    

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'VariantID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }

}
