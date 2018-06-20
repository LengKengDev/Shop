<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (Cart::count() == 0) {
            toastr()->error(__("Cart is empty!"));
            return redirect()->route("cart.index");
        }

        foreach (Cart::content() as $item) {
            if ($item->model->qty < $item->qty) {
                toastr()->error(__("Product :name does not have enough quantity",
                    ["name" => $item->model->name]));
                return redirect()->route("cart.index");
            }
        }

        return view("checkout.index");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        if (Cart::count() == 0) {
            toastr()->error(__("Cart is empty!"));
            return redirect()->route("cart.index");
        }

        foreach (Cart::content() as $item) {
            if ($item->model->qty < $item->qty) {
                toastr()->error(__("Product :name does not have enough quantity",
                    ["name" => $item->model->name]));
                return redirect()->route("cart.index");
            }
        }

        $order = Order::create([
            "user_id" => $request->user()->id,
            "name" => $request->input("name", $request->user()->name),
            "phone" => $request->input("phone", $request->user()->phone),
            "company" => $request->input("company", $request->user()->company),
            "email" => $request->input("email", $request->user()->email),
            "address" => $request->input("address", $request->user()->address),
            "note" => $request->input("note", ""),
            "shipping" => 0,
            "tax" => Cart::tax(),
            "subtotal" => Cart::subtotal(),
            "total" => Cart::total()
        ]);

        foreach (Cart::content() as $item) {
            Item::create([
                "product_id" => $item->model->id,
                "order_id" => $order->id,
                "option" => $item->option ?? "",
                "qty" => $item->qty,
                "price" => $item->price
            ]);
        }

        toastr()->success(__("Order has been created!"));

        Cart::destroy();

        return redirect()->route("home");
    }
}
