<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ForgotPasswordRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (isBeLogin()) {
            return redirect()->route('be.dashboard');
        }

        return view('backend.auth.login');
    }

    public function postLogin()
    {
        $checkLogin = beGuard()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($checkLogin) {
            return redirect()->route('be.dashboard');
        }

        return redirect()->back()->withErrors('Email hoặc Password không chính xác')->withInput(request()->all());
    }

    public function logout()
    {
        beGuard()->logout();
        return redirect()->route('be.login');
    }

    public function forgotPassword()
    {
        return view('backend.auth.forgot-password');
    }

    public function postForgotPassword()
    {
        try {
            $email = request('email');
            $admin = Admin::whereEmail($email)->first();

            if (empty($admin)) {
                return redirect()->back()->with('notification_error', "Email không tồn tại")->withInput();
            }

            $name = extractNameFromEmail($email);
            $otp = time();
            $admin->otp = $otp;
            $admin->save();

            // send email recovery password
            $link = route('be.recovery-password', ['otp' => $otp]);
            $data = ['name' => $name, 'link' => $link];
            try {
                Mail::send('backend.email_template.password-recovery', $data, function ($message) use ($email, $name) {
                    $message->to($email, $name)->subject('Khôi phục mật khẩu');
                });
            } catch (\Exception $e) {
                Log::error($e);
                return redirect()->back()->with('notification_error', t('system_error'));
            }

            return redirect()->back()->with('notification_success', trans('messages.access_email', ['email' => $email]));
        } catch (\Exception $e) {
            return redirect()->back()->with('notification_error', t('system_error'));
        }
    }

    public function getRecoveryPassword($otp)
    {
        $admin = Admin::whereOtp($otp)->first();

        if (empty($admin)) {
            return view('backend.auth.password-recovery-not-found');
        }

        return view('backend.auth.password-recovery', compact('admin', 'otp'));
    }

    public function postRecoveryPassword(ForgotPasswordRequest $forgotPasswordRequest, $otp)
    {
        try {
            // @todo add check otp in 5 minutes

            $admin = Admin::whereOtp($otp)->first();

            if (empty($admin)) {
                return backSystemError(t('system_error'));
            }

            $admin->password = bcrypt(request('password'));
            $admin->otp = null;
            $admin->save();

            return redirect()->route('be.login')->with('notification_success', t('update_password_success'));
        } catch (\Exception $e) {
            Log::error($e);
        }

        return backSystemError(t('system_error'));
    }
}
