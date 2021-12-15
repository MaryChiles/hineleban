<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    function index()
    {

        $countUser = DB::table('users')
            ->where('user_status', 'active')
            ->where('role', '2')->get();
        $finalUserCount = $countUser->count();

        $countProduct = DB::table('products')
            ->where('product_status', 'active')
            ->where('remarks', 'available')->get();
        $finalProductCount = $countProduct->count();

        $sales = DB::table('carts')
            ->where('cart_status', 'done')
            ->sum('price');

        $latest_sales = DB::table('carts')
            ->where('cart_status', 'done')
            ->groupBy('order_num')
            ->latest()
            ->get();

        $highest_selling = Cart::select('product_name', DB::raw('count(*) as total'))
            ->where('cart_status', 'done')
            ->groupBy('product_name')
            ->get();

        $recent_products = Product::latest()->paginate(10);

        // dd($sales);

        return view('dashboards.admins.index', compact(['finalUserCount', 'finalProductCount', 'sales', 'latest_sales', 'recent_products', 'highest_selling']));
    }

    function invoice($order_num)
    {
        $data = Cart::select('carts.*', DB::raw('sum(price) as total'), 'users.name')
        ->where('order_num', $order_num)
        ->where('cart_status', 'done')
        ->join('users','users.id', '=', 'carts.user_id')
        ->groupBy('order_num')
        ->first();

        $order_items = Cart::where('order_num', $order_num)->where('cart_status', 'done')->get();
        
        return view('dashboards.admins.invoice', compact('data','order_items'));
    }

    function profile()
    {
        return view('dashboards.admins.profile');
    }
    function setting()
    {
        return view('dashboards.admins.setting');
    }
    // function product() {
    //     $products = DB::table('products')->get();
    //     return view('dashboards.admins.product', ['products' => $products]);
    // }

    function addproduct()
    {
        return view('dashboards.admins.addproduct');
    }



    // order side


    // function order() {
    //     $orders = DB::table('carts')
    //         ->select('order_num')
    //         ->where('cart_status', 'paid')
    //         ->groupBy('order_num')
    //         ->orderByDesc('id')
    //         ->get();
    //     return view('dashboards.admins.order', ['orders' => $orders]);
    // }



    // payment side

    function payment()
    {
        return view('dashboards.admins.payment');
    }


    //  sales side
    // function sales() {
    //     return view('dashboards.admins.sales');
    // }

    // delivery side 

    function delivery()
    {
        return view('dashboards.admins.delivery');
    }


    // user
    function user()
    {
        $users = DB::table('users')
            ->where('role', '2')
            ->where('user_status', 'active')
            ->get();
        return view('dashboards.admins.user', ['users' => $users]);
    }


    function deactivateuser(Request $request)
    {
        DB::table('users')
            ->where('id', $request['id'])
            ->update(['user_status' => 'inactive']);

        session()->flash('success', 'Deactivated successfully !');
        return redirect()->route('admin.user');
    }


    function deleteuser($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        session()->flash('delete', 'Deleted successfully !');
        return redirect()->route('admin.user');
    }
}
