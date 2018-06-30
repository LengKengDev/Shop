<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.settings.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        setting($request->only(['app_name', 'app_description', 'app_keywords']))->save();
        toastr()->success(__("Updated settings"));
        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function slider()
    {
        $sliders = User::find(1)->getMedia('sliders');
        return view("admin.settings.slider", compact('sliders'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sliderStore(Request $request)
    {
        $user = User::find(1);
        $file = $request->file('image');
        $user->addMedia($file)->setFileName(md5(time().$file->getClientOriginalName()).$file->getClientOriginalExtension())
            ->withCustomProperties(['link' => $request->input('link', "#")])
            ->toMediaCollection('sliders');
        toastr()->success(__("Add slider"));
        return back();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sliderDestroy(Request $request)
    {
        $user = User::find(1);
        $media = $user->getMedia('sliders')->where('id', $request->input('id', 0))->first();
        $media->delete();
        toastr()->success(__("Slider has been deleted!"));
        return back();

    }
}
