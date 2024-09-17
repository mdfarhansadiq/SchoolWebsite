<?php

namespace App\Http\Controllers\adminDashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassNumber;
use App\Models\ClassSection;
use App\Models\NoticeDocument;
use App\Models\TeacherLoginSignup;
use App\Models\OnlineClassVideoLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminDashboardController extends Controller
{
    //
    public function adminDashboardPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            $num_class = ClassNumber::count();
            $num_notice = NoticeDocument::count();
            $num_section = ClassSection::count();
            $num_teacher = TeacherLoginSignup::count();
            $num_video = OnlineClassVideoLink::count();
            return view('backend.dashboard', compact('num_class', 'num_notice', 'num_section', 'num_teacher', 'num_video'));
        }
        return redirect()->route('admin.login');
    }
}
