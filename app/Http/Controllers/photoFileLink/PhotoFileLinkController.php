<?php

namespace App\Http\Controllers\photoFileLink;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\PhotoFileLink;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PhotoFileLinkController extends Controller
{
    //
    public function photoFileLinkPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = PhotoFileLink::all();
            return view('backend.photo-file', compact('data'));
        }
        return redirect()->route('admin.login');
    }

    private function extractGoogleDriveFileId($url)
    {
        if (preg_match('/\/d\/([^\/]+)\//', $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public function photoFileLinkPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $request->validate([
                'photoTitle' => 'required',
                'photofilelink' => 'required',
                // 'bannerimage' => 'required',
            ]);

            $photoFileLink = new PhotoFileLink();
            $photoFileLink->title = $request->photoTitle;

            $links = explode(',', $request->photofilelink);
            $fileIds = [];
            foreach ($links as $link) {
                $link = trim($link);
                $fileId = $this->extractGoogleDriveFileId($link);
                if ($fileId) {
                    $fileIds[] = $fileId;
                }
            }
            // dd($fileIds);
            $photoFileLink->file_link = implode(',', $fileIds);

            // $photoFileLink->banner_image = $request->bannerimage ? 1 : 0;
            $photoFileLink->save();

            Session::flash('success', 'Photo File Link added successfully!');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }


    public function photoFileLinkPageEdit($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = PhotoFileLink::find($id);
            if ($data) {
                return view('backend.edit-photo-file', compact('data'));
            }
            Session::flash('error', 'Photo File Link not found!');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }

    public function photoFileLinkPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $request->validate([
                'photoTitle' => 'required',
                'photofilelink' => 'required',
                // 'bannerimage' => 'required',
            ]);

            $photoFileLink = PhotoFileLink::find($id);
            if ($photoFileLink) {
                $photoFileLink->title = $request->photoTitle;

                $links = explode(',', $request->photofilelink);
                $fileIds = [];
                foreach ($links as $link) {
                    $link = trim($link);
                    $fileId = $this->extractGoogleDriveFileId($link);
                    if ($fileId) {
                        $fileIds[] = $fileId;
                    } else {
                        $fileIds[] = $link;
                    }
                }
                $photoFileLink->file_link = implode(',', $fileIds);

                // $photoFileLink->banner_image = $request->bannerimage ? 1 : 0;
                $photoFileLink->save();

                Session::flash('success', 'Photo File Link updated successfully!');
                return redirect()->back();
            }
            Session::flash('error', 'Photo File Link not found!');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }


    public function photoFileLinkPageDelete($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $photoFileLink = PhotoFileLink::find($id);
            if ($photoFileLink) {
                $photoFileLink->delete();
                Session::flash('success', 'Photo File Link deleted successfully!');
                return redirect()->back();
            }
            Session::flash('error', 'Photo File Link not found!');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }


    public function photoFileLinkSpecificPageDeleteView($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = PhotoFileLink::find($id);
            // if ($data) {
            return view('backend.photo-file-specific-delete', compact('data'));
            // } else {
            //     return redirect()->route('admin.photo-file.view');
            // }
        }
        return redirect()->route('admin.login');
    }

    public function photoFileLinkSpecificPageDeletePost(Request $request)
    {
        $id = $request->id;
        $file_id = $request->fileId;
        $data = PhotoFileLink::find($id);
        if ($data) {
            // Perform the deletion or any other required action
            $links = explode(',', $data->file_link);

            if (in_array($file_id, $links)) {
                $links = array_filter($links, function ($element) use ($file_id) {
                    return $element !== $file_id;
                });
                $data->file_link = implode(',', $links);
                $data->save();
                // $data->delete();
                Session::flash('success', 'Photo deleted successfully!');
                return response()->json(['message' => 'Photo deleted successfully!']);
            }
            Session::flash('error', 'Photo not found!');
            return response()->json(['message' => 'Photo not found!'], 404);
        } else {
            // Handle the case where the record is not found
            Session::flash('error', 'Record not found!');
            return response()->json(['message' => 'Record not found!'], 404);
        }
    }
}
