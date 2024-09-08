<?php

namespace App\Http\Controllers\noticeDocument;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NoticeDocument;
use Illuminate\Support\Facades\Session;

class NoticeDocumentController extends Controller
{
    //
    public function noticeDocumentFrontendView()
    {
        $data = NoticeDocument::all();
        $noticeDocuments = NoticeDocument::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.notice', compact('data', 'noticeDocuments'));
    }


    // This is the admin side
    public function noticeDocumentPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = NoticeDocument::all();
            return view('backend.noticedocument', compact('data'));
        }
        return redirect()->route('admin.login');
    }

    public function noticeDocumentPageCreate(Request $request)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {

            $request->validate([
                'noticeTitle' => 'required|string|max:255',
                'noticeUrl' => 'url',
            ]);

            // Assuming you store these details in a NoticeDocument model
            $noticeDocument = new NoticeDocument();
            $noticeDocument->title = $request->input('noticeTitle');
            $noticeDocument->document_url = $request->input('noticeUrl');

            // If you have a file upload in the future
            // if ($request->hasFile('notice_file')) {
            //     $notice_file = $request->file('notice_file');
            //     $notice_file_name = time() . '_' . $notice_file->getClientOriginalName();
            //     $notice_file->storeAs('public/notice_document', $notice_file_name);
            //     $noticeDocument->file_path = $notice_file_name; // Save file path if needed
            // }

            $noticeDocument->save();

            Session::flash('success', 'Notice created successfully!');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }

    public function noticeDocumentPageEdit($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = NoticeDocument::findOrFail($id);
            return view('backend.edit-noticedocument', compact('data'));
        }
        return redirect()->route('admin.login');
    }

    public function noticeDocumentPageUpdate(Request $request, $id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $request->validate([
                'noticeTitle' => 'required|string|max:255',
                'noticeUrl' => 'url',
            ]);

            $noticeDocument = NoticeDocument::findOrFail($id);
            $noticeDocument->title = $request->input('noticeTitle');
            $noticeDocument->document_url = $request->input('noticeUrl');

            // If you have a file upload in the future
            // if ($request->hasFile('notice_file')) {
            //     $notice_file = $request->file('notice_file');
            //     $notice_file_name = time() . '_' . $notice_file->getClientOriginalName();
            //     $notice_file->storeAs('public/notice_document', $notice_file_name);
            //     $noticeDocument->file_path = $notice_file_name; // Save file path if needed
            // }

            $noticeDocument->save();

            Session::flash('success', 'Notice updated successfully!');
            return redirect()->route('admin.noticedocument.view');
        }
        return redirect()->route('admin.login');
    }


    public function noticeDocumentPageDelete($id)
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $data = NoticeDocument::find($id);
            $data->delete();
            Session::flash('success', 'Notice deleted successfully!');
            return redirect()->back();
        }
        return redirect()->route('admin.login');
    }
}
