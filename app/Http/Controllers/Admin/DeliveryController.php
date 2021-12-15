<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    //

    function index() {
        $deliveries = DB::table('carts')
            ->select('order_num')
            ->where('cart_status', 'deliver')
            ->groupBy('order_num')
            ->get();

        return view('dashboards.admins.delivery', ['deliveries' => $deliveries]);
    }


    function show($order_num) {
        $deliveries = DB::select('select * from carts where order_num = ?', [$order_num]);
        return view('dashboards.admins.viewdelivery', ['deliveries' => $deliveries]);
    }


    function delivereddelivery (Request $request) {
        DB::table('carts')
        ->where('order_num', $request['order_num'])
        ->update(['cart_status' => 'done' ]);

        session()->flash('doned', 'Order will deliver');
        return redirect()->route('admin.delivery');
    }




    function donedelivery() {
        $donedeliveries = DB::table('carts')
            ->select('order_num')
            ->where('cart_status', 'done')
            ->groupBy('order_num')
            ->get();

            return view('dashboards.admins.donedelivery', ['donedeliveries' => $donedeliveries]);
    }

    function viewdonedelivery($order_num) {
        $viewdonedelivery = DB::select('select * from carts where order_num = ?', [$order_num]);
        return view('dashboards.admins.viewdonedelivery', ['viewdonedelivery' => $viewdonedelivery]);
    }


}
