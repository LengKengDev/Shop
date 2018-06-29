<?php

namespace App\Http\Controllers\Admin\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('active', 1);
        return DataTables::of(User::query()->where('active', $status))
            ->addColumn('action', 'admin.users.action')
            ->editColumn('active', function ($user) {
                if($user->active == false) {
                    return "Chưa kích hoạt";
                }
                return "Đã kích hoạt";
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
