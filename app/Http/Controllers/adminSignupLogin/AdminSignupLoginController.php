<?php

namespace App\Http\Controllers\adminSignupLogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminSignupLoginModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


class AdminSignupLoginController extends Controller
{
    //
    public function adminSignupPageView()
    {
        if (Session::has('admin_login_role')) {
            return redirect('/ourschool-admin/dashboard');
        }
        return view('backend.signup');
    }

    public function adminSignupPageCreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin_signup_login_models|max:255',
            'password' => 'required|min:9',
        ]);

        try {
            $data = new AdminSignupLoginModel();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Crypt::encrypt($request->password);
            $count_data = AdminSignupLoginModel::count();

            if ($count_data == 0) {
                $data->role = 1;
                Session::put('admin_login_role', 1);
            } else {
                $data->role = 0;
            }
            $data->save();
            if (Session::has('admin_login_role')) {
                return redirect('/ourschool-admin/dashboard');
            }
            return redirect()->back()->with('success', 'Successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function adminLoginPageView()
    {
        if (Session::has('admin_login_role')) {
            return redirect('/ourschool-admin/dashboard');
        }
        return view('backend.login');
    }

    public function adminLoginPageCreate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $data = AdminSignupLoginModel::where('email', $request->email)->first();

            if ($data) {
                $password = Crypt::decrypt($data->password);
                if ($request->password == $password) {
                    if ($data->role == 1) {
                        Session::put('admin_login_role', 1);
                        // return redirect()->route('admin.dashboard');
                        return redirect('/ourschool-admin/dashboard');
                    } else {
                        return redirect()->back()->with('error', 'You are not authorized to access this page.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid password.');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid email.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function adminLogout()
    {
        // session()->forget('admin_login_role');
        Session::forget('admin_login_role');
        return redirect()->route('admin.login');
    }
}
