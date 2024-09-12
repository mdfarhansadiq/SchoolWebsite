<?php

namespace App\Http\Controllers\classSection;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\ClassNumber;
use App\Models\ClassSection;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ClassSectionController extends Controller
{
    //
    public function classSectionPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            $classsection = ClassSection::all();
            return view('backend.class-section', compact('classnumber', 'classsection'));
        }
        return redirect()->route('admin.login');
    }

    public function classSectionPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required',
            ]);

            // This will dump the request data, use it for debugging purposes.
            $classSectionRecord = ClassSection::where('class_number_id', $request->classNumber)
                ->where('class_section', $request->classSection)
                ->first();

            if ($classSectionRecord) {
                Session::flash('error', 'Class Section already exists');
                return redirect()->back();
            }

            $classSection = new ClassSection();
            $classSection->class_number_id = $request->classNumber;
            $classSection->class_section = $request->classSection;
            $classSection->save();

            Session::flash('success', 'Class Section Added Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }


    public function classSectionPageEdit($id)
    {
        //
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            $data = ClassSection::find($id);
            return view('backend.edit-class-section', compact('data', 'classnumber'));
        }
        return redirect()->route('admin.login');
    }

    public function classSectionPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required'
            ]);

            $classSection = ClassSection::find($id);
            $existingClassSectionRecord = ClassSection::where('class_number_id', $request->classNumber)
                ->where('class_section', $request->classSection)
                ->first();

            if (!$classSection) {
                Session::flash('error', 'Class Section not found');
                return redirect()->back();
            }

            if ($existingClassSectionRecord && $classSection->id != $existingClassSectionRecord->id) {
                Session::flash('error', 'Class Section already exists');
                return redirect()->back();
            }

            $classSection->class_number_id = $request->classNumber;
            $classSection->class_section = $request->classSection;
            $classSection->save();

            Session::flash('success', 'Class Section Updated Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }


    public function classSectionPageDelete($id)
    {
        //
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classSection = ClassSection::find($id);
            $classSection->delete();
            Session::flash('success', 'Class Section Deleted Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }
}
