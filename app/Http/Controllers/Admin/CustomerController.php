<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //

    function index() {
        $customers = DB::table('users')
            ->where('role', 2)
            ->where('enable_customer', 'active')
            ->orderByDesc('id')
            ->get();

            return view('dashboards.admins.customer', compact('customers'));
    }

    function showcustomer($id) {
        $customers = DB::select('select * from users where id =?', [$id]);
        return view('dashboards.admins.userspecific', compact('customers'));
    }

    function deactivatecustomer(Request $request) {
        DB::table('users')
        ->where('id', $request['id'])
        ->update(['enable_customer' => 'inactive']);


        session()->flash('success', 'Deactivated successfully !');
        return redirect()->route('admin.customer');
    }
}
