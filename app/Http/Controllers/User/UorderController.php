<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UorderController extends Controller
{
    //

    public function indexorders () {
        $id = Auth::id();
        $myorders = DB::table('carts')
            ->select('order_num')
            ->where('user_id', $id)
            ->where('cart_status', 'paid')
            ->orWhere('cart_status', 'deliver')
            ->groupBy('order_num')
            ->get();

            return view('dashboards.users.myorders',  ['myorders' => $myorders]);
    }


    public function myordersdone () {
        $id = Auth::id();
        $myordersdone = DB::table('carts')
            ->select('order_num')
            ->where('user_id', $id)
            ->where('cart_status', 'done')
            ->groupBy('order_num')
            ->get();

            return view('dashboards.users.myordersdone',  ['myordersdone' => $myordersdone]);
    }


    public function showmyorders($order_num) {
            $user_id = Auth::id();
            $specificorder = DB::select('select * from carts where order_num = ? and user_id = ?', [$order_num, $user_id]);

            return view('dashboards.users.showmyorders', compact('specificorder'));
    }


    public function showmyordersdone($order_num) {
        $user_id = Auth::id();
        $showmyordersdone = DB::select('select * from carts where order_num = ? and user_id = ?', [$order_num, $user_id]);

        return view('dashboards.users.showmyordersdone', compact('showmyordersdone'));
}

}
