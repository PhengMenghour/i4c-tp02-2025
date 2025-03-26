<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at']; // Ensure deleted_at is treated as a date
    protected $fillable = ['name', 'pricing', 'description', 'images', 'category_id'];

    // Relationships remain the same
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function order_Products()
    {
        return $this->hasMany(OrderProduct::class);
    }

}