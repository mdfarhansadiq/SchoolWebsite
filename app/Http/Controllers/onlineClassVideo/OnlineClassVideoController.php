<?php

namespace App\Http\Controllers\onlineClassVideo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\OnlineClassVideoLink;
use App\Models\ClassNumber;
use App\Models\ClassSection;
use Illuminate\Http\Request;

class OnlineClassVideoController extends Controller
{
    //
    public function classVideoPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            $data = OnlineClassVideoLink::all();
            return view('backend.class-record', compact('data', 'classnumber'));
        }
        return redirect()->route('admin.login');
    }


    public function classSectionSelectData($id)
    {
        $section = ClassSection::where('class_number_id', $id)->pluck('class_section', 'id');
        return response()->json($section);
    }


    public function classVideoPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required',
                'classTitle' => 'required|string',
                'classVideoLink' => 'required|url',  // Ensure it's a valid URL
            ]);

            // Function to extract YouTube video ID
            function getYouTubeVideoId($url)
            {
                if (preg_match('/(youtu\.be\/|v=|\/embed\/|\/v\/|watch\?v=|&v=)([^#&?]*).*/', $url, $matches)) {
                    return $matches[2]; // Extract the video ID
                }
                return null;
            }

            // Extract the video ID from the provided link
            $videoId = getYouTubeVideoId($request->classVideoLink);

            // Check if the video ID was extracted successfully
            if (!$videoId) {
                return redirect()->back()->withErrors(['classVideoLink' => 'Invalid YouTube URL provided.']);
            }

            // Create a new instance of OnlineClassVideoLink model and save data
            $data = new OnlineClassVideoLink();
            $data->class_number_id = $request->classNumber;
            $data->class_section_id = $request->classSection;
            $data->title = $request->classTitle;
            $data->video_link = $videoId;  // Save the extracted video ID instead of the full URL
            $data->save();

            // Flash success message and redirect back
            Session::flash('success', 'Class Video Link Added Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }

    public function classVideoPageEdit($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $classnumber = ClassNumber::all();
            $data = OnlineClassVideoLink::find($id);
            return view('backend.edit-class-record', compact('data', 'classnumber'));
        }
        return redirect()->route('admin.login');
    }

    public function classVideoPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            // Validate the input fields
            $request->validate([
                'classNumber' => 'required',
                'classSection' => 'required',
                'classTitle' => 'required|string',
                'classVideoLink' => 'required',  // Ensure it's a valid URL
            ]);

            // Function to extract YouTube video ID
            function getYouTubeVideoId($url)
            {
                if (preg_match('/(youtu\.be\/|v=|\/embed\/|\/v\/|watch\?v=|&v=)([^#&?]*).*/', $url, $matches)) {
                    return $matches[2]; // Extract the video ID
                }
                return $url;
            }

            // Extract the video ID from the provided link
            $videoId = getYouTubeVideoId($request->classVideoLink);

            // Update the existing record
            $data = OnlineClassVideoLink::find($id);
            $data->class_number_id = $request->classNumber;
            $data->class_section_id = $request->classSection;
            $data->title = $request->classTitle;
            $data->video_link = $videoId;  // Save the extracted video ID instead of the full URL
            $data->save();

            // Flash success message and redirect back
            Session::flash('success', 'Class Video Link Updated Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }

    public function classVideoPageDelete($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = OnlineClassVideoLink::find($id);
            $data->delete();
            Session::flash('success', 'Class Video Link Deleted Successfully');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }
}
