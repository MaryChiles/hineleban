<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //

    function product() {

        $id = Auth::id();
        $countCart = DB::table('carts')
        ->where('cart_status', 'pending')
        ->where('user_id', $id)->get();
        $finalCount = $countCart->count();


        $products = DB::table('products')->get();




        // return view('dashboards.users.index', ['products', 'finalCount' => $products, $finalCount]);
        return view('dashboards.users.index', compact(['finalCount', 'products']));
    }

    function addtocart(Request $request) {
        $request->validate([
            'user_id' => ['required'],
            'product_id' => ['required'],
            'product_name' => ['required'],
            'image' => ['required'],
            'price' => ['required'],
            'created_at' => ['required']

        ]);

        $cart = new Cart();  
        $cart->user_id = $request->user_id;
        $cart->product_id = $request->product_id;
        $cart->product_name = $request->product_name;
        $cart->image = $request->image;
        $cart->price = $request->price;
        $cart->created_at = $request->created_at;
        

        if($cart->save()) {
            return redirect()->back()->with('success', 'Added to cart');
        }
        else {
            return redirect()->back()->with('error', 'Failed to add');
        }

    }
}
