<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Teacher;
use App\Models\User;

class TeacherController extends Controller
{
    public function index()
    {
        $data = Teacher::orderBy('id', 'desc')->paginate(getConstant('BACKEND_PAGINATE'));

        $viewData = [
            'data' => $data
        ];

        return view('backend.teacher.index', $viewData);
    }

    public function create()
    {
        return view('backend.teacher.create');
    }

    public function store(UserRequest $request)
    {
        try {
            $params = request()->all();

            if (request()->hasFile('avatar')) {
                $fileName = time() . "_" . request()->file('avatar')->getClientOriginalName();
                $pathTmp = 'backend/upload/teacher';
                $uploadPath = public_path($pathTmp); // Folder upload path

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                request()->file('avatar')->move($uploadPath, $fileName);
                $thumbnail = $pathTmp . '/' . $fileName;
                $params['avatar'] = $thumbnail;
            }

            $teacher = new Teacher();
            $teacher->fill($params);
            $teacher->save();

            return backRouteSuccess('be.teacher.index', 'Thêm mới thành công');
        } catch (\Exception $e) {
        }
        return backRouteError('be.teacher.index', 'Đã có lỗi sảy ra');


    }

    public function edit($id)
    {
        $data = Teacher::findOrFail($id);
        return view('backend.teacher.edit', compact('data'));
    }

    public function update($id, UserRequest $request)
    {
        try {
            $data = Teacher::findOrFail($id);
            $params = request()->all();

            if (request()->hasFile('avatar')) {
                $fileName = time() . "_" . request()->file('avatar')->getClientOriginalName();
                $pathTmp = 'backend/upload/teacher';
                $uploadPath = public_path($pathTmp); // Folder upload path

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                request()->file('avatar')->move($uploadPath, $fileName);
                $thumbnail = $pathTmp . '/' . $fileName;
                $params['avatar'] = $thumbnail;
            }
            $data->update($params);
            $data->save();
            return redirect()->route('be.teacher.index')->with('notification_success', trans('messages.success'));
        } catch (\Exception $e) {
            return redirect()->route('be.teacher.index')->with('notification_success', trans('messages.system_error'));
        }
    }

    public function destroy($id)
    {
        try {
            Teacher::destroy($id);
            return redirect()->back()->with('notification_success', trans('messages.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('notification_error', trans('messages.system_error'));
        }
    }
}
