<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'Date',
        'TotalAmount',
        'OrderBy',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'Date' => 'datetime',
        'TotalAmount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'OrderBy');
    }

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class, 'OrderID','OrderID');
    }
}