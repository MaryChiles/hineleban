<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    function order() {
        $orders = DB::table('carts')
            ->select('order_num')
            ->where('cart_status', 'paid')
            ->groupBy('order_num')
            ->orderByDesc('id')
            ->get();
        return view('dashboards.admins.order', ['orders' => $orders]);
    }

    function show($order_num) {
        $orders = DB::select('select * from carts where  order_num =?', [$order_num]);
        return view('dashboards.admins.vieworder', ['orders' => $orders]);
    }


    function deliverorder(Request $request) {
        DB::table('carts')
        ->where('order_num', $request['order_num'])
        ->update(['cart_status' => 'deliver']);

        session()->flash('delivered', 'Delivery / Move to delivery tab successfully !');
        return redirect()->route('admin.order');
    }
}
