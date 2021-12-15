<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\UorderController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function() {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware'=>['isAdmin','auth', 'PreventBackHistory']], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('setting', [AdminController::class, 'setting'])->name('admin.setting');
    Route::get('product', [AdminController::class, 'product'])->name('admin.product');

    Route::get('/invoice/{order_num}', [AdminController::class, 'invoice']);


    Route::get('addproduct', [AdminController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('postproduct', [ProductController::class, 'postproduct'])->name('admin/postproduct');
    Route::get('delete/{id}', [ProductController::class, 'destroy']);
    Route::get('product', [ProductController::class, 'product'])->name('admin.product');
    Route::get('edit/{id}', [ProductController::class, 'show']);
    Route::post('edit/{id}', [ProductController::class, 'edit']);

    // order
    Route::get('order', [OrderController::class, 'order'])->name('admin.order');
    Route::get('show/{order_num}', [OrderController::class, 'show']);
    Route::post('deliverorder', [OrderController::class, 'deliverorder'])->name('order.deliver');

    // Route::get('payment', [AdminController::class, 'payment'])->name('admin.payment');

    // sales

    Route::get('sales', [SalesController::class, 'sales'])->name('admin.sales');
    Route::get('sales_details/{product_name}', [SalesController::class, 'sales_details']);
    // Route::get('salesperday/{created_at}', [SalesController::class, 'salesperday']);
    Route::post('salesperday', [SalesController::class, 'salesperday'])->name('sales.perday');

    

    // delivery

    Route::get('delivery', [DeliveryController::class, 'index'])->name('admin.delivery');
    Route::get('viewdelivery/{order_num}', [DeliveryController::class,'show']);
    Route::post('delivereddelivery', [DeliveryController::class, 'delivereddelivery'])->name('delivery.delivered');

    Route::get('donedelivery', [DeliveryController::class, 'donedelivery'])->name('admin.donedelivery');
    Route::get('viewdonedelivery/{order_num}', [DeliveryController::class, 'viewdonedelivery']);




    // customer

    Route::get('customer', [CustomerController::class, 'index'])->name('admin.customer');
    Route::get('showcustomer/{id}', [CustomerController::class, 'showcustomer']);
    Route::post('deactivatecustomer', [CustomerController::class, 'deactivatecustomer'])->name('customer.deactivate');



    // user
    Route::get('user', [AdminController::class, 'user'])->name('admin.user');
    Route::post('deactivateuser' , [AdminController::class, 'deactivateuser'])->name('user.deactivate');
    Route::get('deleteuser/{id}', [AdminController::class, 'deleteuser']);



    // chart
    Route::get('chart', [ChartController::class, 'index'])->name('admin.chart');






});


// user to +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Route::group(['prefix' => 'user', 'middleware' =>['isUser','auth', 'PreventBackHistory']], function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('setting', [UserController::class, 'setting'])->name('user.setting');


    Route::get('dashboard', [ShopController::class, 'product'])->name('user.dashboard');   //this is product show and cart count item
    Route::post('addtocart', [ShopController::class, 'addtocart'])->name('user/addtocart');


    Route::get('cart', [CartController::class, 'index'])->name('user.cart');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


    Route::get('placeorderbankdeposit', [CartController::class, 'placeorderbankdeposit'])->name('user.placeorderbankdeposit');
    Route::get('placeordercash', [CartController::class, 'placeordercash'])->name('user.placeordercash');
    Route::get('placeordercheque', [CartController::class, 'placeordercheque'])->name('user.placeordercheque');
    // Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');



    Route::post('checkoutbank', [CartController::class, 'checkoutbank'])->name('checkout.bank');
    Route::post('checkoutcash', [CartController::class, 'checkoutcash'])->name('checkout.cash');
    Route::post('checkoutcheque', [CartController::class, 'checkoutcheque'])->name('checkout.cheque');


    Route::get('myorders', [UorderController::class, 'indexorders'])->name('user.myorders');
    Route::get('myordersdone', [UorderController::class, 'myordersdone'])->name('user.myorders');



    Route::get('showmyorders/{order_num}', [UorderController::class, 'showmyorders']);
    Route::get('showmyordersdone/{order_num}', [UorderController::class, 'showmyordersdone']);






});