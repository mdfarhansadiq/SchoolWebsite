<?php

namespace App\Http\Controllers\homePage;

use App\Http\Controllers\Controller;
use App\Models\NoticeDocument;
use App\Models\AdminSignupLoginModel;
use App\Models\TeacherInfo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function homePageView()
    {
        $noticeDocuments = NoticeDocument::all();
        $admin_logged_in = null;
        $admin_logged_in = Session::get('admin_login_role');
        $notice_documents_1 = NoticeDocument::orderBy('created_at', 'desc')->take(3)->get();
        $teacher_info = TeacherInfo::where('active_status', 1)->get();
        return view('frontend.home', compact('noticeDocuments', 'notice_documents_1', 'admin_logged_in', 'teacher_info'));
    }
}
