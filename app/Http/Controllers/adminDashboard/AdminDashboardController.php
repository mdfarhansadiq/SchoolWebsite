<?php

namespace App\Http\Controllers\adminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminDashboardController extends Controller
{
    //
    public function adminDashboardPageView()
    {
        $admin_role = Session::get('admin_login_role');
        if ($admin_role == 1) {
            return view('backend.dashboard');
        }
        return redirect()->route('admin.login');
    }
}
