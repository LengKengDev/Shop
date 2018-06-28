<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('account.user.index');
    }

    public function update(Request $request)
    {
        $request->user()->update($request->only(['name', 'address', 'company', 'phone']));
        toastr()->success(__("Cập nhật thông tin tài khoản thành công."));
        return back();
    }
}
