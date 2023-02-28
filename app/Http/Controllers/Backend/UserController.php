<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id', 'desc')->paginate(getConstant('BACKEND_PAGINATE'));

        $viewData = [
            'data' => $data
        ];

        return view('backend.user.index', $viewData);
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {
        try {
            User::destroy($id);
            return redirect()->back()->with('notification_success', trans('messages.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('notification_error', trans('messages.system_error'));
        }
    }
}
