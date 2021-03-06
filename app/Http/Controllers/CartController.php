<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;
use Validator;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cart.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->input("id", 0));
        if(!$product) {
            toastr()->error(__("Product doesn't exists!"));
            return back();
        }

        $qty = $request->input('qty', $product->qty_per_unit);

//        if($product->qty > 0 && $product->qty >= $qty) {
//
//        } else {
//            toastr()->error(__("The current system no longer has enough quantity!"));
//        }
        Cart::add($product, $qty, $request->input('option', []));
        toastr()->success(__("Item was added to your cart!"));

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            toastr()->error(__("Quantity invalid, please try again!"));
            return back();
        }

        $qty = $request->input("qty", $product->qty_per_unit);
//        if ($product->qty >= $qty && $product->qty >= $qty) {
//
//        } else {
//            toastr()->error(__("The current system no longer has enough quantity!"));
//        }

        Cart::update($request->input("rowId", ""), $qty);
        toastr()->success(__("Quantity has been changed!"));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        Cart::remove($request->input("rowId", ""));
        toastr()->success(__("Item has been removed"));
        return back();
    }
}
