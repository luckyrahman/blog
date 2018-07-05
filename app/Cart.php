<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     public function product_detail()
    {
        return $this->hasOne(Product::class);
    }
}
