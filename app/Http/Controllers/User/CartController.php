<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

 public function index() {
     $id = Auth::id();
     $carts = DB::table('carts')
     ->where('cart_status', 'pending')
     ->where('user_id', $id)->get();

     $countTotal = DB::table('carts')
     ->select(DB::raw('SUM(quantity * price) AS totals_count'))
     ->where('cart_status', 'pending')
     ->where('user_id', $id)
     ->get();

    return view('dashboards.users.cart', compact(['carts', 'countTotal']));
 }


 public function updateCart(Request $request) {

    DB::table('carts')
        ->where('id', $request['id'])
        ->update(['quantity' => $request['quantity']]);

    session()->flash('success', 'Item Cart is Updated Successfully !');
    return redirect()->route('user.cart');
}

public function removeCart(Request $request) {
    // DB::remove($request->id);
    DB::table('carts')
        ->where('id', $request['id'])->delete();


    session()->flash('success', 'Item Cart Remove Successfully !');
    return redirect()->route('user.cart');
}

public function clearAllCart(Request $request) {
    DB::table('carts')
        ->where('cart_status', 'pending')
        ->where('user_id', $request['user_id'])->delete();

    session()->flash('success', 'All Item Cart Clear Successfully !');
    return redirect()->route('user.cart');
}

// public function checkout(Request $request) {
//     DB::table('carts')
//     ->where('user_id', $request['user_id'])
//     ->where('cart_status', 'pending')
//     ->update(['cart_status' => $request['cart_status']]);

//     session()->flash('success', 'Successfully checkout!');
//     return redirect()->route('user.cart');
// }

public function placeorderbankdeposit() {

    $id = Auth::id();
     $carts = DB::table('carts')
     ->where('cart_status', 'pending')
     ->where('user_id', $id)->get();


     $countTotal = DB::table('carts')
     ->select(DB::raw('SUM(quantity * price) AS totals_count'))
     ->where('cart_status', 'pending')
     ->where('user_id', $id)
     ->get();

    return view('dashboards.users.placeorderbankdeposit', compact(['carts', 'countTotal']));
}


public function placeordercash() {
    $id = Auth::id();
     $carts = DB::table('carts')
     ->where('cart_status', 'pending')
     ->where('user_id', $id)->get();


     $countTotal = DB::table('carts')
     ->select(DB::raw('SUM(quantity * price) AS totals_count'))
     ->where('cart_status', 'pending')
     ->where('user_id', $id)
     ->get();

    return view('dashboards.users.placeordercash', compact(['carts', 'countTotal']));
}



public function placeordercheque() {
    $id = Auth::id();
     $carts = DB::table('carts')
     ->where('cart_status', 'pending')
     ->where('user_id', $id)->get();


     $countTotal = DB::table('carts')
     ->select(DB::raw('SUM(quantity * price) AS totals_count'))
     ->where('cart_status', 'pending')
     ->where('user_id', $id)
     ->get();

    return view('dashboards.users.placeordercheque', compact(['carts', 'countTotal']));
}


// public function checkout(Request $request) {
//     DB::table('carts')
//     ->where('user_id', $request['user_id'])
//     ->where('cart_status', 'pending')
//     ->update(['cart_status' => $request['cart_status']]);

//     session()->flash('success', 'Successfully checkout!');
//     return redirect()->route('user.cart');
// }



public function checkoutbank(Request $request) {
    DB::table('carts')
    ->where('user_id', $request['user_id'])
    ->where('cart_status' , 'pending')
    ->update(['cart_status' => 'paid', 'payment_method' => $request['payment_method'], 'bank_name' => $request['bank_name'], 'account_num' => $request['account_num'], 'order_num' => $request['order_num']]);


    DB::table('users')
    ->where('id', $request['user_id'])
    ->where('enable_customer', 'inactive')
    ->update(['enable_customer' => 'active']);


    return redirect()->route('user.dashboard')->with('success', 'Successfully checkout');
}



public function checkoutcash(Request $request) {
    DB::table('carts')
    ->where('user_id', $request['user_id'])
    ->where('cart_status' , 'pending')
    ->update(['cart_status' => 'paid', 'payment_method' => $request['payment_method'], 'order_num' => $request['order_num']]);

    DB::table('users')
    ->where('id', $request['user_id'])
    ->where('enable_customer', 'inactive')
    ->update(['enable_customer' => 'active']);

    return redirect()->route('user.dashboard')->with('success', 'Successfully checkout');
}

public function checkoutcheque(Request $request) {
    DB::table('carts')
    ->where('user_id', $request['user_id'])
    ->where('cart_status' , 'pending')
    ->update(['cart_status' => 'paid', 'payment_method' => $request['payment_method'], 'order_num' => $request['order_num'], 'account_num' => $request['account_num']]);

    DB::table('users')
    ->where('id', $request['user_id'])
    ->where('enable_customer', 'inactive')
    ->update(['enable_customer' => 'active']);
    
    return redirect()->route('user.dashboard')->with('success', 'Successfully checkout');
}



}
