<?php

namespace App\Http\Controllers\teacherInfo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\TeacherInfo;
use App\Models\TeacherLoginSignup;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TeacherInfoController extends Controller
{
    //
    public function teacherInfoPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = TeacherInfo::all();
            return view('backend.teacher', compact('data'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function teacherInfoPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'teacherEmail' => 'required|email|unique:teacher_login_signups,email',
                'teacherPass' => 'required|string|min:8',
                'teacherName' => 'required|string|max:255',
                'teacherPosition' => 'required|string|max:255',
                'teacherContact' => 'required|string',
                'teacherYearExp' => 'required|integer|min:0',
                'teacherEducation' => 'required|string',
                'teacherTeachingSubject' => 'required|string',
                'teacherPhoto' => 'required',
            ]);

            // Create a new AdminSignupLoginModel instance and save data
            $teacheracc = new TeacherLoginSignup();
            $teacheracc->email = $request->input('teacherEmail');
            $teacheracc->password = Crypt::encrypt($request->input('teacherPass')); // Encrypt the password // Set the 'name' field
            $teacheracc->save();

            // Create a new TeacherInfo instance and save data
            $teacher = new TeacherInfo();
            $teacher->teacher_acc_id = $teacheracc->id;
            $teacher->name = $request->input('teacherName');
            $teacher->position = $request->input('teacherPosition');
            $teacher->contact_info = $request->input('teacherContact');
            $teacher->years_of_experience = $request->input('teacherYearExp');
            $teacher->educational_qualification = $request->input('teacherEducation');
            $teacher->teaching_subjects = $request->input('teacherTeachingSubject');
            preg_match('/\/d\/(.*?)\//', $request->input('teacherPhoto'), $matches);
            $teacher->photo_link = $matches[1];
            $teacher->active_status = $request->has('teacherStatus') ? 1 : 0; // Set active status based on checkbox
            $teacher->save();

            Session::flash('success', 'Teacher information added successfully!');
            return redirect()->route('admin.teacher.view');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function teacherInfoPageEdit($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $teacher = TeacherInfo::find($id);
            $teacheraccount = TeacherLoginSignup::all();
            return view('backend.edit-teacher', compact('teacher', 'teacheraccount'));
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function teacherInfoPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            // dd($request->all());
            $request->validate([
                'teacherAccount' => [
                    'required',
                    'exists:teacher_login_signups,id',
                    // Ensure teacher_acc_id is unique except for the current record
                    Rule::unique('teacher_infos', 'teacher_acc_id')->ignore($id, 'id'),
                ],
                'teacherName' => 'required|string|max:255',
                'teacherPosition' => 'required|string|max:255',
                'teacherContact' => 'required|string',
                'teacherYearExp' => 'required|integer|min:0',
                'teacherEducation' => 'required|string',
                'teacherTeachingSubject' => 'required|string',
                'teacherPhoto' => 'required',
            ]);

            // Find the TeacherInfo instance by ID
            $teacher = TeacherInfo::find($id);

            if (!$teacher) {
                return redirect()->route('admin.teacher.view')->with('error', 'Teacher not found.');
            }
            // Update the TeacherInfo instance with the new data
            $teacher->teacher_acc_id = $request->input('teacherAccount'); // Update teacher account
            $teacher->name = $request->input('teacherName');
            $teacher->position = $request->input('teacherPosition');
            $teacher->contact_info = $request->input('teacherContact');
            $teacher->years_of_experience = $request->input('teacherYearExp');
            $teacher->educational_qualification = $request->input('teacherEducation');
            $teacher->teaching_subjects = $request->input('teacherTeachingSubject');
            $teacherPhotoUrl = $request->input('teacherPhoto');
            // Regular expression to extract the file ID from Google Drive URL
            preg_match('/\/d\/([^\/]+)\//', $teacherPhotoUrl, $matches);
            if (isset($matches[1])) {
                $teacher->photo_link = $matches[1];
            } else {
                $teacher->photo_link = $teacher->photo_link;
            }
            $teacher->active_status = $request->has('teacherStatus') ? 1 : 0; // Set active status based on checkbox

            // Save updated teacher information
            $teacher->save();

            Session::flash('success', 'Teacher information updated successfully!');
            return redirect()->route('admin.teacher.view');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function teacherInfoPageDelete($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $teacher = TeacherInfo::find($id);
            if ($teacher) {
                $teacher->delete();
                Session::flash('success', 'Teacher information deleted successfully!');
                return redirect()->back();
            } else {
                Session::flash('error', 'Teacher information not found!');
                return redirect()->back();
            }
        } else {
            return redirect()->route('admin.login');
        }
    }



    public function teacherInfoAnotherPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = TeacherInfo::all();
            $teacheraccount = TeacherLoginSignup::all();
            return view('backend.teacher-another', compact('data', 'teacheraccount'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function teacherInfoAnotherPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'teacherAccount' => [
                    'required',
                    'exists:teacher_login_signups,id',  // Validate it exists in teacher_login_signups table
                    Rule::unique('teacher_infos', 'teacher_acc_id'), // Ensure teacher_acc_id is unique
                ],
                'teacherName' => 'required|string|max:255',
                'teacherPosition' => 'required|string|max:255',
                'teacherContact' => 'required|string',
                'teacherYearExp' => 'required|integer|min:0',
                'teacherEducation' => 'required|string',
                'teacherTeachingSubject' => 'required|string',
                'teacherPhoto' => 'required',
            ]);

            // Create a new TeacherInfo instance
            $teacher = new TeacherInfo();
            // Fill the teacher data
            $teacher->teacher_acc_id = (int) $request->input('teacherAccount'); // Ensure it's an integer
            $teacher->name = $request->input('teacherName');
            $teacher->position = $request->input('teacherPosition');
            $teacher->contact_info = $request->input('teacherContact');
            $teacher->years_of_experience = $request->input('teacherYearExp');
            $teacher->educational_qualification = $request->input('teacherEducation');
            $teacher->teaching_subjects = $request->input('teacherTeachingSubject');

            preg_match('/\/d\/(.*?)\//', $request->input('teacherPhoto'), $matches);
            $teacher->photo_link = $matches[1];
            $teacher->active_status = $request->has('teacherStatus') ? 1 : 0; // Set active status based on checkbox

            // Save the new teacher information
            $teacher->save();

            // Flash success message to session
            Session::flash('success', 'Teacher information added successfully!');

            // Redirect back or to a specific route
            return redirect()->route('admin.teacher.another.view');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function teacherInfoAnotherPageEdit($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $teacher = TeacherInfo::find($id);
            $teacheraccount = TeacherLoginSignup::all();
            return view('backend.edit-teacher-another', compact('teacher', 'teacheraccount'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function teacherInfoAnotherPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            // dd($request->all());
            $request->validate([
                'teacherAccount' => [
                    'required',
                    'exists:teacher_login_signups,id',
                    // Ensure teacher_acc_id is unique except for the current record
                    Rule::unique('teacher_infos', 'teacher_acc_id')->ignore($id, 'id'),
                ],
                'teacherName' => 'required|string|max:255',
                'teacherPosition' => 'required|string|max:255',
                'teacherContact' => 'required|string',
                'teacherYearExp' => 'required|integer|min:0',
                'teacherEducation' => 'required|string',
                'teacherTeachingSubject' => 'required|string',
                'teacherPhoto' => 'required',
            ]);

            // Find the TeacherInfo instance by ID
            $teacher = TeacherInfo::find($id);

            if (!$teacher) {
                return redirect()->route('admin.teacher.view')->with('error', 'Teacher not found.');
            }
            // Update the TeacherInfo instance with the new data
            $teacher->teacher_acc_id = $request->input('teacherAccount'); // Update teacher account
            $teacher->name = $request->input('teacherName');
            $teacher->position = $request->input('teacherPosition');
            $teacher->contact_info = $request->input('teacherContact');
            $teacher->years_of_experience = $request->input('teacherYearExp');
            $teacher->educational_qualification = $request->input('teacherEducation');
            $teacher->teaching_subjects = $request->input('teacherTeachingSubject');
            $teacherPhotoUrl = $request->input('teacherPhoto');

            preg_match('/\/d\/([^\/]+)\//', $teacherPhotoUrl, $matches);

            if (isset($matches[1])) {
                $teacher->photo_link = $matches[1];
            } else {
                $teacher->photo_link = $teacher->photo_link;
            }
            $teacher->active_status = $request->has('teacherStatus') ? 1 : 0; // Set active status based on checkbox

            // Save updated teacher information
            $teacher->save();

            Session::flash('success', 'Teacher information updated successfully!');
            return redirect()->route('admin.teacher.another.view');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
