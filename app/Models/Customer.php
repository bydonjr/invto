<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


        use HasFactory;

        protected $fillable = [
            'name',
            'phone',
            'email',
        ];

//        public function saleProducts()
//    {
//        return $this->hasMany(SaleProduct::class);
//    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }


}
