<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function index() {
        return view('dashboards.users.index');
    }

    function profile() {
        return view('dashboards.users.profile');
    }
    function setting() {
        return view('dashboards.users.setting');
    }

    function myorders() {
        return view('dashboards.users.myorders');
    }
}
