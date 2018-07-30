<?php

namespace App\Http\Controllers\Admin\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return DataTables::of(Product::query())
            ->editColumn('updated_at', function ($product) {
                return $product->updated_at->diffForHumans();
            })
            ->editColumn('price', function ($product) {
                return money($product->price, 'VND');
            })
            ->editColumn('name', function ($product) {
                return "<img src='{$product->getFirstMedia("images")->getFullUrl("thumb")}' class='img-product-thumb' height='50px'/>
                        <a href='".route('products.show', $product)."' target='_blank'>{$product->name}</a>";
            })
            ->addColumn('action', 'admin.products.action')
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request)
    {
        return DataTables::of(Product::query()->onlyTrashed())
            ->editColumn('updated_at', function ($product) {
                return $product->updated_at->diffForHumans();
            })
            ->editColumn('price', function ($product) {
                return money($product->price, 'VND');
            })
            ->editColumn('name', function ($product) {
                return "<img src='{$product->getFirstMedia("images")->getFullUrl("thumb")}' class='img-product-thumb' height='50px'/>
                        <a href='".route('products.show', $product)."' target='_blank'>{$product->name}</a>";
            })
            ->addColumn('action', 'admin.products.action2')
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
