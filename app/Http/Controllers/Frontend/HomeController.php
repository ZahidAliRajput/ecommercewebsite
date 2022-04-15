<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        $products = Product::all();
        return view('frontend.products.manage', compact('products'));
    }

    public function WishlistCount(){
        $wishlists = Wishlist::all();
        $wishlistcount = $wishlists->count();
        return view('frontend.layout.header', compact('wishlistcount'));
    }
    public function SingleProduct($slug){
        $product = Product::where('slug', $slug)->with('subcategory')->first();
        // dd($product);
        return view('frontend.products.singleproduct', compact('product'));
    }

}
