<?php

namespace App\Http\Controllers\adminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminDashboardController extends Controller
{
    //
    public function adminDashboardPageView(){
        // dd('Hiiiiii');
        // $admin_role = Session::get('admin_login_role');
        // if($admin_role == 1){
        //     return redirect('/ourschool-admin/dashboard');
        // }
         Session::forget('admin_login_role');
        // return redirect()->route('admin.login');

        return redirect('/ourschool-admin/dashboard');
    }
}
