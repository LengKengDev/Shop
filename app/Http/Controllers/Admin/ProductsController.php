<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use App\Product;
use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\Models\Media;
use Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.products.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'categories.*' => "exists:categories,id",
            'summary' => "required",
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'qty' => "numeric",
            'qty_per_unit' => 'nullable|numeric',
            'minimum_unit' => 'nullable|numeric',
            'status' => Rule::in(['inStock', 'outOfStock', 'contact', 'stop']),
        ]);

        if ($validator->fails()) {
            toastr()->error(__("Something was wrong!"));
            return back()->withErrors($validator)->withInput();
        }

        $product = Product::create($request->only(['name', 'summary', 'description',
            'price', 'sale_price', 'status', 'qty', 'qty_per_unit', 'minimum_unit', 'sku']));

        foreach ($request->file('images', []) as $file) {
            $product->addMedia($file)
                ->setFileName(md5(time().$file->getClientOriginalName()).$file->getClientOriginalExtension())
                ->toMediaCollection('images');
        }

        $product->categories()->sync($request->input('categories',[]));

        if ($request->has('options')) {
            foreach ($request->input('options', []) as $option) {
                $new_option = Option::create(['name' => $option['option'], 'product_id' => $product->id]);
                foreach ($option['values'] as $value) {
                    $new_value = Value::create(['value' => $value, 'option_id' => $new_option->id]);
                }
            }
        }

        toastr()->success(__("Product has been created!"));
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load(['options', 'options.values']);
        return view('admin.products.edit', compact(['product']));
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
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'categories.*' => "exists:categories,id",
            'summary' => "required",
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'qty' => "numeric",
            'qty_per_unit' => 'nullable|numeric',
            'minimum_unit' => 'nullable|numeric',
            'status' => Rule::in(['inStock', 'outOfStock', 'contact', 'stop']),
        ]);

        if ($validator->fails()) {
            toastr()->error(__("Something was wrong!"));
            return back()->withErrors($validator)->withInput();
        }

        $product->update($request->only(['name', 'summary', 'description',
            'price', 'sale_price', 'status', 'qty', 'qty_per_unit', 'minimum_unit', 'sku']));

        foreach ($request->file('images', []) as $file) {
            $product->addMedia($file)
                ->setFileName(md5(time().$file->getClientOriginalName()).$file->getClientOriginalExtension())
                ->toMediaCollection('images');
        }

        $product->categories()->sync($request->input('categories',[]));

        $product->options()->delete();

        if ($request->has('delete')) {
            Media::destroy($request->only(['delete']));
        }

        if ($request->has('options')) {
            foreach ($request->input('options', []) as $option) {
                $new_option = Option::create(['name' => $option['option'], 'product_id' => $product->id]);
                foreach ($option['values'] as $value) {
                    $new_value = Value::create(['value' => $value, 'option_id' => $new_option->id]);
                }
            }
        }

        toastr()->success(__("Product has been updated!"));
        return redirect()->route("admin.products.edit", $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toastr()->success(__("Product has been deleted!"));
        return back();
    }
}
