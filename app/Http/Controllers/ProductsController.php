<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Seo;
use OpenGraph;
use Twitter;
use SEOMeta;

class ProductsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        SEO::setDescription($product->summary);
        OpenGraph::addImage($product->getFirstMedia('images')->getFullUrl());
        Twitter::addImage($product->getFirstMedia('images')->getFullUrl());
        SEOMeta::addKeyword($product->name);
        SEOMeta::addKeyword($product->sku);

        return view("products.show", compact(["product"]));
    }

}
