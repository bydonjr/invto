<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'photo',
        'price',
    ];

    public function salesItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}
