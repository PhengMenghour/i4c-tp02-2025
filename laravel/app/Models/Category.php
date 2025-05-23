<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at']; // Ensure deleted_at is treated as a date
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}