<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProductID';

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'ProductID');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'ProductID');
    }
}
