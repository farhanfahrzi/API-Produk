<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory; 

    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];
    
        public function products()
        {
            return $this->hasMany(Product::class);
        }
    
        // public function user()
        // {
        //     return $this->belongsTo(User::class, 'user_id');
        // }
}
