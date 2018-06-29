<?php

namespace App\Http\Controllers\Admin\Api;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {

        $status = $request->input('status', 'new');
        return DataTables::of(Order::query()->where('status', $status))
            ->editColumn('total', function ($order) {
                return money($order->total, 'VND');
            })
            ->editColumn('status', function ($order) {
                return ucwords($order->status);
            })
            ->editColumn('user.name', function ($order) {
                return "<a target='_blank' href='".route('admin.orders.edit', $order)."'>{$order->user->name} ({$order->user->email})</a>";
            })
            ->addColumn('action', 'admin.orders.action')
            ->rawColumns(['user.name', 'action'])
            ->make(true);
    }
}
