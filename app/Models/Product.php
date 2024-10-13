<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name', 'price', 'image', 'categoriey_id'
    ];

    // protected $fillable = ['name', 'price', 'image', 'product_category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
