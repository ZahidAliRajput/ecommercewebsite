<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function CheckOut()
    {
        return view('frontend.checkout.manage');
    }

    public function PlaceOrder(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return back()->with('message', $validator->errors()->first());
        }
        $cart = session()->get('cart');
        if($cart > 0)
        {
            foreach ($cart as $key => $value) 
            {
                $orderitem = new OrderItem();
                $orderitem->product_id = $key;
                $orderitem->qty = $value['quantity'];
                $orderitem->price = $value['quantity'] * $value['price'];
                $orderitem->email = $request->email;
                $orderitem->save();
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Sorry Your Cart is empty, Please select a Product to Proceed Order!');
        }
        // if($orderitem->id == 1){
            \Mail::to('rzahidali501@gmail.com')->send(new \App\Mail\RegisterUser());
        // }
        return back()->with('message', 'Your Order is Procedded, check your email for registration.');
    }







    public function OrderItems(){
        $userid = Auth::user()->id;
        $productsArray = [];
        $userdetails = User::where('id', $userid)->first();
        $orderitems = OrderItem::with('products')->where('email', $userdetails->email)->get();
        dd($orderitems);
        // foreach($orderitems as $orderitem){
        //     $products = Product::where('id', $orderitem->product_id)->get();
        //     array_push($productsArray , $products);
        // }

        return view('frontend.orderitems.manage', compact('orderitems'));
        // return view('frontend.orderitems.manage', compact('orderitems', 'productsArray'));
    }















}
