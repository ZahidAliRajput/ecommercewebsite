<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'slug',
        'image',
        'title',
        'price',
        'description',
    ];
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }
    public function orderitem(){
        return $this->belongsTo(OrderItem::class);
    }
}