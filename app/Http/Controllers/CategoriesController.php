<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy = $request->input('orderBy', 'id');
        $orderType = $request->input('orderType', 'desc');
        $total = Product::count();
        $products = Product::orderBy($orderBy, $orderType)->paginate(12);
        return view("categories.index", compact(['products', 'total', 'orderBy', 'orderType']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        $orderBy = $request->input('orderBy', 'id');
        $orderType = $request->input('orderType', 'desc');
        $total = 0;
        $products = null;
        if ($category->parent == null) {
            $total = Product::subCategoriesProducts($category)->count();
            $products = Product::subCategoriesProducts($category)->orderBy($orderBy, $orderType)->paginate(12);
        }
        else {
            $total = $category->products()->count();
            $products = $category->products()->orderBy($orderBy, $orderType)->paginate(12);
        }
        return view("categories.show", compact(["category", "products", "total", 'orderBy', 'orderType']));
    }
}
