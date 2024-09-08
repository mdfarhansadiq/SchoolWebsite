<?php

namespace App\Http\Controllers\homePage;

use App\Http\Controllers\Controller;
use App\Models\NoticeDocument;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function homePageView()
    {
        $noticeDocuments = NoticeDocument::all();
        $notice_documents_1 = NoticeDocument::orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.home', compact('noticeDocuments', 'notice_documents_1'));
    }
}
