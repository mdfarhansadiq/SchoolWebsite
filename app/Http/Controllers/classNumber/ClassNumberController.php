<?php

namespace App\Http\Controllers\classNumber;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\ClassNumber;
use Illuminate\Http\Request;

class ClassNumberController extends Controller
{
    //
    public function classNumberPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = ClassNumber::all();
            return view('backend.class-number', compact('data'));
        }
        return redirect()->route('admin.login');
    }

    public function classNumberPageCreate(Request $request)
    {
        //
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input field
            $request->validate([
                'classNumber' => 'required|integer|unique:class_numbers,class_number|min:1|max:5',
            ]);

            // Create a new instance of ClassNumber model and save data
            $data = new ClassNumber();
            $data->class_number = $request->classNumber;
            $data->save();

            // Flash success message and redirect back
            Session::flash('success', 'Class Number Added Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }

    public function classNumberPageEdit($id)
    {
        //
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = ClassNumber::find($id);
            return view('backend.edit-class-number', compact('data'));
        }
        return redirect()->route('admin.login');
    }

    public function classNumberPageUpdate(Request $request, $id)
    {
        //
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input field
            $request->validate([
                'classNumber' => 'required|integer|unique:class_numbers,class_number,' . $id . '|min:1|max:5',
            ]);

            // Update the existing record
            $data = ClassNumber::find($id);
            $data->class_number = $request->classNumber;
            $data->save();

            // Flash success message and redirect back
            Session::flash('success', 'Class Number Updated Successfully');
            return redirect()->route('admin.class-number.view');
        }
        return redirect()->route('admin.login');
    }

    public function classNumberPageDelete($id)
    {
        //
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = ClassNumber::find($id);
            $data->delete();
            Session::flash('success', 'Class Number Deleted Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }
}
