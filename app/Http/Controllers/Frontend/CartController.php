<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        return view('frontend.products.addcartmanage');
    }

    public function addToCart($id){
        $product = Product::where('id', $id)->with('subcategory')->first();
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
        } else {
                $cart[$id] = [
                "title" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request){
        if($request->quantity && $request->id){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart Updated Successfully.');
        }
    }

    // public function update(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart updated successfully');
    //     }
    // }

public function remove(Request $request){
    // dd();
    if($request->id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$request->id]))
        {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Product removed Successfully.');
    }
}




}
