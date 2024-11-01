<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'invoice_details';

    protected $fillable = [
        'OrderID',
        'ProductID',
        'Quantity',
        'VariantID',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'OrderID','OrderID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID','ProductID');
    }
    public function variant()
{
    return $this->belongsTo(ProductVariant::class, 'VariantID', 'VariantID'); // Adjust if necessary
}
}