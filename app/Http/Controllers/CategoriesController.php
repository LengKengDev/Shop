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
    public function index()
    {
        $products = Product::orderBy("name")->paginate(9);
        return view("categories.index", compact(['products']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = null;
        if ($category->parent == null) {
            $products = Product::subCategoriesProducts($category)->paginate(9);
        }
        else {
            $products = $category->products()->paginate(9);
        }
        return view("categories.show", compact(["category", "products"]));
    }
}
