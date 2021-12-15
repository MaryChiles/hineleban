<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    //
    function sales() {
        $sales = DB::table('carts')
        ->select('product_name')
        ->where('cart_status', 'done')
        ->orWhere('cart_status', 'paid')
        ->orWhere('cart_status', 'deliver')
        ->groupBy('product_name')
        ->get();
        return view('dashboards.admins.sales', ['sales' => $sales]);
    }

    function sales_details($product_name) {
        $product_name_sales_details = DB::table('carts')
            ->select('created_at', 'product_name')
            ->where('product_name', $product_name)
            ->where('cart_status', "<>" , 'pending')
            ->groupBy('created_at', 'product_name')
            ->get();

            return view('dashboards.admins.sales_details', ['product_name_sales_details' => $product_name_sales_details]);
    }


    function salesperday(Request $request) {

        $all_specific_details = DB::table('carts')
            ->where('created_at' , $request['created_at'])
            ->where('product_name', $request['product_name'])
            ->where('cart_status', "<>", 'pending')
            ->get();

            // dd($all_specific_details);
            return view('dashboards.admins.salesperday', ['all_specific_details' => $all_specific_details]);
      
    }
}
