<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Observers\CategoryObserver;
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
        return view("admin.categories.create");
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
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        if ($validator->fails()) {
            toastr()->error(__("Invalid data input"));
            return back()->withErrors($validator)->withInput();
        }

        Category::create($request->only(["name", "description", "position", "parent_id"]));
        toastr()->success(__("Category has been created!"));
        return redirect()->route("admin.categories.index");
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
            'update' => Rule::in(["update-info", "update-position"]),
        ]);

        if ($validator->fails()) {
            toastr()->error(__("Invalid action !"));
            return back();
        }
        $update = $request->input('update', 'update-info');

        switch ($update) {
            case 'update-info':
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'parent_id' => 'nullable|exists:categories,id'
                ]);

                if ($validator->fails()) {
                    toastr()->error(__("Invalid data input !"));
                    return back()->withErrors($validator);
                } else {
                    $category->update($request->only(['name', 'description', 'parent_id', 'position']));
                    toastr()->success(__("Category has been updated!"));
                    return redirect()->route("admin.categories.edit", $category);
                }
                break;
            case 'update-position':
                $action = $request->input('action', "");
                switch ($action) {
                    case "up":
                        if ($category->position != 1) {
                            $swap = null;

                            if($category->parent == null) {
                                $swap = Category::mainCategories2()->where('position', '<', $category->position)->first();
                            } else {
                                $swap = $category->parent->childs2()->where('position', '<', $category->position)->first();
                            }

                            if ($swap != null) {
                                $tmp = $category->position;
                                $category->position = $swap->position;
                                $swap->position = $tmp;
                                $swap->save();
                                $category->save();
                                toastr()->success(__("Category position has been updated!"));
                            } else {
                                toastr()->success(__("Category position update fails!"));
                            }
                        }
                        break;
                    case "down":
                        $position = $category->parent == null ? Category::mainCategories()->count() : $category->parent->childs->count();
                        if ($category->position != $position) {
                            $swap = null;

                            if($category->parent == null) {
                                $swap = Category::mainCategories()->where('position', '>', $category->position)->orderBy("position", "desc")->first();
                            } else {
                                $swap = $category->parent->childs()->where('position', '>', $category->position)->orderBy("position", "desc")->first();
                            }
                            if ($swap != null) {
                                $tmp = $category->position;
                                $category->position = $swap->position;
                                $swap->position = $tmp;
                                $swap->save();
                                $category->save();
                                toastr()->success(__("Category position has been updated!"));
                            } else {
                                toastr()->success(__("Category position update fails!"));
                            }
                        }
                        break;

                    default:
                        toastr()->error(__("Invalid action"));
                }
                return back();
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
        $category->delete();
        toastr()->success(__("Category has been deleted!"));
        return back();
    }
}
