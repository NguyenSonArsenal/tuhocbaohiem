<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserRequest;
use App\Models\User;

class   AuthController extends Controller
{
    public function login()
    {
        return view('frontend.login');
    }

    public function postLogin()
    {
        return view('frontend.login');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function postRegister(UserRequest $request)
    {
        try {
            $params = request()->all();
            $params['password'] = bcrypt(request('password'));
            $user = new User();
            $user->fill($params);
            $user->save();
            return redirect()->route('fe.login')->with('notification_success', trans('messages.success'));
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('notification_error', trans('messages.system_error'));
        }
    }
}
