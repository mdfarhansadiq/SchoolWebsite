<?php

namespace App\Http\Controllers\onlineClassLink;

use App\Http\Controllers\Controller;
use App\Models\ClassNumber;
use App\Models\ClassSection;
use App\Models\OnlineClassLink;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class OnlineClassLinkController extends Controller
{
    //
    public function onlineClassLinkPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            return view('backend.online-class-link', compact('classnumber'));
        }

        return redirect()->route('admin.login');
    }



    public function classSectionSelectData($id)
    {
        $section = ClassSection::where('class_number_id', $id)->pluck('class_section', 'id');
        return response()->json($section);
    }


    public function onlineClassLinkPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required',
                'classSubject' => 'required',
                'onlineClassLink' => 'required',
                'onlineClassDate' => 'required',
                'onlineClassTime' => 'required',
            ]);

            $data = new OnlineClassLink();
            $data->class_number_id = $request->classNumber;
            $data->class_section_id = $request->classSection;
            $data->subject = $request->classSubject;
            $data->link = $request->onlineClassLink;
            $data->class_date = $request->onlineClassDate;
            $data->class_time = $request->onlineClassTime;

            $data->save();
            Session::flash('success', 'Online Class Link Added Successfully');
            return redirect()->back();
        }

        return redirect()->route('admin.login');
    }

    public function onlineClassLinkPageEdit($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            $classsection = ClassSection::all();
            $data = OnlineClassLink::find($id);
            return view('backend.edit-online-class-link', compact('classnumber', 'classsection', 'data'));
        }

        return redirect()->route('admin.login');
    }

    public function onlineClassLinkPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required',
                'classSubject' => 'required',
                'onlineClassLink' => 'required',
                'onlineClassDate' => 'required',
                'onlineClassTime' => 'required',
            ]);

            $data = OnlineClassLink::find($id);
            $data->class_number_id = $request->classNumber;
            $data->class_section_id = $request->classSection;
            $data->subject = $request->classSubject;
            $data->link = $request->onlineClassLink;
            $data->class_date = $request->onlineClassDate;
            $data->class_time = $request->onlineClassTime;

            $data->save();
            Session::flash('success', 'Online Class Link Updated Successfully');
            return redirect()->route('admin.online-class-link.view');
        }

        return redirect()->route('admin.login');
    }

    
    public function onlineClassLinkPageDelete($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = OnlineClassLink::find($id);
            $data->delete();
            Session::flash('success', 'Online Class Link Deleted Successfully');
            return redirect()->back();
        }

        return redirect()->route('admin.login');
    }
}
