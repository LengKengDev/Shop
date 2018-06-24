<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $validator = Validator::make($request->all(), [
            'submit' => Rule::in(["update-info", "update-position"]),
        ]);

        if ($validator->fails()) {
            toastr()->error(__("Invalid action !"));
            return back();
        }
        $action = $request->input('submit', 'update-info');

        switch ($action) {
            case 'update-info':
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'parent_id' => 'nullable|exists:categories,id'
                ]);

                if ($validator->fails()) {
                    toastr()->error(__("Invalid data input !"));
                    return back()->withErrors($validator);
                } else {
                    $category->update($request->only(['name', 'description', 'parent_id']));
                    toastr()->success(__("Category has been updated!"));
                    return redirect()->route("admin.categories.edit", $category);
                }
                break;
            case 'update-position':
                dd($request->all());
                break;
            default:
                toastr()->error(__("Invalid data input !"));
                return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
