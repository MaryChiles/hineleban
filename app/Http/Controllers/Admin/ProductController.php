<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    //
    function postproduct(Request $request) {
        $prodname = Product::where('name', $request['name'])->first();

        $request->validate([
            'name' => ['required', 'string'],
            'weight' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
            'remarks' => ['required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
            if($image = $request->file('image')) 
                $destinationPath  = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";

                Product::create($input);

             return redirect()->back()->with('success', 'Successfully added');



        // if($prodname) {
        //     return redirect()->back()->with('taken', 'Product name and weight exist');
        // }
        // else {
        //     $input = $request->all();
        //     if($image = $request->file('image')) {
        //         $destinationPath  = 'image/';
        //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //         $image->move($destinationPath, $profileImage);
        //         $input['image'] = "$profileImage";

        //         Product::create($input);

        //         return redirect()->back()->with('success', 'Successfully added');
        //     }
        // }
           
    }

    function product() {
        $products = DB::table('products')->get();
        return view('dashboards.admins.product', ['products' => $products]);
    }

    function show($id) {
        $products = DB::select('select * from products where id = ?', [$id]);
        return view('dashboards.admins.editproduct', ['products' => $products]);
    }

    function edit(Request $request,$id) {
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        DB::update('update products set quantity = quantity + ?, price =  ? where id = ?', [$quantity, $price, $id]);
        // return view('dashboards.admins.editproduct');
        return redirect()->back()->with('updated', 'Updated successfully');
    }


    function destroy($id) {
        DB::delete('delete from products where id = ?', [$id]);
        return redirect()->back()->with('delete');
    }

    
}
