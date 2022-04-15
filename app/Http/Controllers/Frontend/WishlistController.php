<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store($id)
    {
        $status = Wishlist::where('user_id', 1)->where('product_id', $id)->first();

        if (isset($status->user_id) and isset($status->product_id)) {
            return redirect()->back()->with('message', 'This item is already in your
       wishlist!');
        } else {
            $wishlist = new Wishlist();
            $wishlist->product_id = $id;
            $wishlist->user_id = 1;
            $wishlist->save();
            return back()->with('message', 'Product is added to Wishlist.');
        }
    }
    public function manage()
    {
        $wishlists = Wishlist::with('product')->get();
        return view('frontend.wishlist.manage', compact('wishlists'));
    }
    public function RemoveFromWishList($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return back()->with('message', 'Product is removed from wishlist successfully');
    }
}
