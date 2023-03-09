<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function teacher()
    {
        $teacher = Teacher::orderBy('id', 'desc')->paginate(6);
        $countTeacher = Teacher::count();
        return view('frontend.teacher', compact(['teacher', 'countTeacher']));
    }

    public function showTeacher($slug)
    {
        dd('sdff');
    }

    public function postContact()
    {
        try {
            $contact = new Contact();
            $contact->fill(request()->all());
            $contact->save();
            return redirect()->back()->with('notification_success', 'Liên hệ được ghi nhận. Chúng tôi sẽ sớm phản hồi qua email tới bạn. Xin cảm ơn.');
        } catch (\Exception $e) {
            return redirect()->back()->with('notification_error', trans('messages.system_error'));
        }
    }
}
