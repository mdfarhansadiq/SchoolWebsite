<?php

namespace App\Http\Controllers\lectureAndNoteFile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\ClassNumber;
use App\Models\ClassSection;
use App\Models\LectureNoteFile;
use Illuminate\Http\Request;

class LectureNoteFileController extends Controller
{
    //
    public function lectureNoteFilePageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            $classsection = ClassSection::all();
            $files = LectureNoteFile::all();
            return view('backend.lecture-note-file', compact('classnumber', 'classsection', 'files'));
        }
        return redirect()->route('admin.login');
    }


    public function classSectionSelectData($id)
    {
        $section = ClassSection::where('class_number_id', $id)->pluck('class_section', 'id');
        return response()->json($section);
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

    public function lectureNoteFilePageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');

        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required',
                'classLectureNoteTitle' => 'required|string',
                'classLectureNotelink' => 'required|string', // Ensure it's a valid URL format if needed
            ]);

            // Create a new instance of LectureNoteFile model and save data
            $data = new LectureNoteFile();
            $data->class_number_id = $request->classNumber;
            $data->class_section_id = $request->classSection;
            $data->title = $request->classLectureNoteTitle;

            // Handling links, extracting Google Drive file IDs
            $links = explode(',', $request->classLectureNotelink);
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
            Session::flash('success', 'Lecture Note File Added Successfully');
            return redirect()->back();
        }

        return redirect()->route('admin.login');
    }



    public function lectureNoteFilePageEdit($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            $classsection = ClassSection::all();
            $data = LectureNoteFile::find($id);
            return view('backend.edit-lecture-note-file', compact('data', 'classnumber', 'classsection'));
        }
        return redirect()->route('admin.login');
    }

    public function lectureNoteFilePageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required',
                'classLectureNoteTitle' => 'required|string',
                'classLectureNotelink' => 'required|string', // Ensure it's a valid URL format if needed
            ]);

            // Update the LectureNoteFile record
            $data = LectureNoteFile::find($id);
            $data->class_number_id = $request->classNumber;
            $data->class_section_id = $request->classSection;
            $data->title = $request->classLectureNoteTitle;

            // Handling links, extracting Google Drive file IDs
            $links = explode(',', $request->classLectureNotelink);
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

            // Flash success message and redirect back
            Session::flash('success', 'Lecture Note File Updated Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }

    public function lectureNoteFilePageDelete($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = LectureNoteFile::find($id);
            $data->delete();
            Session::flash('success', 'Lecture Note File Deleted Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }
}
