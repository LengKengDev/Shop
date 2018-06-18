<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        return view("home.index");
    }
}
