<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query', '');
        $products = Product::search($query)->paginate(9);
        return view('search.index', compact(['products', 'query']));
    }
}
