<?php

namespace App\Http\Controllers\Account;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $request->user()->orders()->orderBy('id', 'desc')->paginate();
        return view('account.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order)
    {
        if ($order->user_id != $request->user()->id) {
            toastr()->error(__("You do not have permission to access this page!"));
            return redirect()->route('account.orders.index');
        }
        return view('account.orders.show', compact('order'));
    }
}
