<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
//    public function indexorders () {
//         $id = Auth::id();
//         $myorders = DB::table('carts')
//             ->where('user_id', $id)
//             ->get();

//             return view('dashboards.users.myorders',  ['myorders' => $myorders]);
//     }


}
