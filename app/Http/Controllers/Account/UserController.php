<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Hash;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('account.user.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->user()->update($request->only(['name', 'address', 'company', 'phone']));
        toastr()->success(__("Cập nhật thông tin tài khoản thành công."));
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_old' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            toastr()->error(__("Mật khẩu phải tối thiểu 6 ký tự!"));
            return back();
        }

        if (Hash::check($request->input('password_old'), $request->user()->password)) {
            $request->user()->update(['password' => bcrypt($request->input('password'))]);
            toastr()->success(__("Mật khẩu đổi thành công!"));
        } else {
            toastr()->error(__("Mật khẩu cũ không chính xác hoặc không đúng định dạng!"));
        }

        return back();
    }
}
