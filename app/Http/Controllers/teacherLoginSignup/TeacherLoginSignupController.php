<?php

namespace App\Http\Controllers\teacherLoginSignup;

use App\Http\Controllers\Controller;
use App\Models\TeacherLoginSignup;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class TeacherLoginSignupController extends Controller
{
    //
    public function teacherLoginSignupInfoPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = TeacherLoginSignup::all();
            return view('backend.teacher-login-signup-info', compact('data'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function teacherLoginSignupInfoPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'teacherEmail' => 'required|email|unique:teacher_login_signups,email',
                'teacherPass' => 'required|string|min:8',
            ]);
            // Create a new TeacherLoginSignup instance and save data
            $teacheracc = new TeacherLoginSignup();
            $teacheracc->email = $request->input('teacherEmail');
            $teacheracc->password = Crypt::encrypt($request->input('teacherPass'));

            $teacheracc->save();

            Session::flash('success', 'Teacher account created successfully!');
            return redirect()->route('admin.teacher-login-signup-info.view');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
