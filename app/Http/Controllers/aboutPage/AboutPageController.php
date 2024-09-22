<?php

namespace App\Http\Controllers\aboutPage;

use App\Http\Controllers\Controller;
use App\Models\NoticeDocument;
use App\Models\AdminSignupLoginModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    //
    public function aboutPageView()
    {
        $noticeDocuments = NoticeDocument::all();
        $admin_logged_in = null;
        $admin_logged_in = Session::get('admin_login_role');
        return view('frontend.about', compact('noticeDocuments', 'admin_logged_in'));
    }
}
