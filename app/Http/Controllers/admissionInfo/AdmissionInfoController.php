<?php

namespace App\Http\Controllers\admissionInfo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\ClassNumber;
use App\Models\ClassSection;
use App\Models\AdmissionInfo;
use App\Models\NoticeDocument;
use Illuminate\Http\Request;

class AdmissionInfoController extends Controller
{
    //
    public function admissionInfoFrontendView()
    {
        $data = AdmissionInfo::orderBy('admission_start_date', 'desc')->get();
        $noticeDocuments = NoticeDocument::all();
        return view('frontend.admission-info', compact('data', 'noticeDocuments'));
    }


    public function admissionInfoPageView()
    {
        if (Session::has('admin_login_role')) {
            $classnumber = ClassNumber::all();
            // $classsection = ClassSection::all();
            $data = AdmissionInfo::all();
            return view('backend.admission-info', compact('classnumber', 'data'));
        }

        return redirect()->route('admin.login');
    }

    // Helper function to extract Google Drive file ID from URL
    private function extractGoogleDriveFileId($url)
    {
        $pattern = '/^https:\/\/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)\/?/i';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public function admissionInfoPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');

        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'classNumber' => 'required',
                'admissionStartDate' => 'required|date',
                'admissionEndDate' => 'required|date',
                'admissionInfoLink' => 'required|string', // Ensure it's a valid URL format if needed
            ]);

            // Create a new instance of LectureNoteFile model and save data
            if($request->admissionStartDate > $request->admissionEndDate)
            {
                Session::flash('error', 'Start date cannot be greater than end date.');
                return redirect()->back();
            }

            $data = new AdmissionInfo();
            $data->class_number_id = $request->classNumber;
            $data->admission_start_date = $request->admissionStartDate;
            $data->admission_end_date = $request->admissionEndDate;

            // Handling links, extracting Google Drive file IDs
            $links = explode(',', $request->admissionInfoLink);
            $fileIds = [];

            foreach ($links as $link) {
                $link = trim($link);
                $fileId = $this->extractGoogleDriveFileId($link);
                if ($fileId) {
                    $fileIds[] = $fileId;
                }
            }

            $data->file_link = implode(',', $fileIds); // Save as comma-separated file IDs

            $data->save();
            // Flash success message and redirect back
            Session::flash('success', 'Admission Info Added Successfully');
            return redirect()->back();
        }

        return redirect()->route('admin.login');
    }


    public function admissionInfoPageEdit($id)
    {
        if (Session::has('admin_login_role')) {
            $classnumber = ClassNumber::all();
            $data = AdmissionInfo::find($id);
            return view('backend.edit-admission-info', compact('classnumber', 'data'));
        }

        return redirect()->route('admin.login');
    }

    public function admissionInfoPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');

        if ($admin_role == 1) {
            $request->validate([
                'classNumber' => 'required',
                'admissionStartDate' => 'required|date',
                'admissionEndDate' => 'required|date',
                'admissionInfoLink' => 'required|string', // Ensure it's a valid URL format if needed
            ]);

            if($request->admissionStartDate > $request->admissionEndDate)
            {
                Session::flash('error', 'Start date cannot be greater than end date.');
                return redirect()->back();
            }

            $data = AdmissionInfo::find($id);
            $data->class_number_id = $request->classNumber;
            $data->admission_start_date = $request->admissionStartDate;
            $data->admission_end_date = $request->admissionEndDate;

            // Handling links, extracting Google Drive file IDs
            $links = explode(',', $request->admissionInfoLink);
            $fileIds = [];

            foreach ($links as $link) {
                $link = trim($link);
                $fileId = $this->extractGoogleDriveFileId($link);
                if ($fileId) {
                    $fileIds[] = $fileId;
                }
                else if($fileId == null)
                {
                    $fileIds[] = $link;
                }
            }

            $data->file_link = implode(',', $fileIds); // Save as comma-separated file IDs

            $data->save();
            Session::flash('success', 'Admission Info Updated Successfully');
            return redirect()->route('admin.admission-info.view');
        }

        return redirect()->route('admin.login');
    }

    public function admissionInfoPageDelete($id)
    {
        $admin_role = Session::get('admin_login_role');

        if ($admin_role == 1) {
            $data = AdmissionInfo::find($id);
            $data->delete();
            Session::flash('success', 'Admission Info Deleted Successfully');
            return redirect()->back();
        }

        return redirect()->route('admin.login');
    }

}
