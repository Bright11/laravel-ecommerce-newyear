<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function Category()
    {

        return $this->belongsTo(Category::class, "category_slug");
    }
    public function Cart()
    {
       return $this->belongsTo(Cart::class);
    }

    public function Wishlist()
    {
       return $this->belongsTo(Wishlist::class);
    }
}
