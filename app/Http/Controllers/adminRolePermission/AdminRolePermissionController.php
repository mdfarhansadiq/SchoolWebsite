<?php

namespace App\Http\Controllers\adminRolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\AdminSignupLoginModel;
use Illuminate\Http\Request;

class AdminRolePermissionController extends Controller
{
    //
    public function adminRolePermissionPageView()
    {
        if (Session::has('admin_login_role')) {
            $admin_email = Session::get('admin_email');
            $data = AdminSignupLoginModel::all();
            return view('backend.admin-role-permission', compact('data', 'admin_email'));
        }
        return redirect()->route('admin.login');
    }


    public function adminRolePermissionPageCreate(Request $request)
    {
        if (Session::has('admin_login_role')) {
            // Validate the input fields
            $request->validate([
                'adminName' => 'required|string|max:255',
                'adminEmail' => 'required|email|unique:admin_signup_login_models,email',
                'adminPass' => 'required|string|min:9',
                'adminRole' => 'integer|min:0|max:1',
            ]);

            // Create a new AdminSignupLoginModel instance and save data
            $adminacc = new AdminSignupLoginModel();
            $adminacc->name = $request->input('adminName');
            $adminacc->email = $request->input('adminEmail');
            $adminacc->password = Crypt::encrypt($request->input('adminPass')); // Encrypt the password
            $adminacc->role = $request->input('adminRole') ? 1 : 0;
            $adminacc->save();

            Session::flash('success', 'Admin account created successfully!');
            return redirect()->route('admin.role.view');
        }
        return redirect()->route('admin.login');
    }


    public function adminRolePermissionPageEdit($id)
    {
        if (Session::has('admin_login_role')) {
            $admin = AdminSignupLoginModel::find($id);
            $admin_email = Session::get('admin_email');

            if ($admin->email != $admin_email) {
                return view('backend.edit-admin-role-permission', compact('admin'));
            } else {
                return redirect()->route('admin.role.view');
            }
        }
        return redirect()->route('admin.login');
    }

    public function adminRolePermissionPageUpdate(Request $request, $id)
    {
        if (Session::has('admin_login_role')) {
            // Validate the input fields
            $request->validate([
                'adminName' => 'required|string|max:255',
                'adminEmail' => 'required|email|unique:admin_signup_login_models,email,' . $id,
                'adminPass' => 'nullable|string|min:9',
                'adminRole' => 'integer|min:0|max:1',
            ]);

            // Find the AdminSignupLoginModel instance by ID
            $admin = AdminSignupLoginModel::find($id);

            if (!$admin) {
                return redirect()->route('admin.role.view')->with('error', 'Admin account not found.');
            }

            // Update the AdminSignupLoginModel instance with the new data
            $admin->name = $request->input('adminName');
            $admin->email = $request->input('adminEmail');
            if ($request->input('adminPass')) {
                $admin->password = Crypt::encrypt($request->input('adminPass')); // Encrypt the password
            }
            $admin->role = $request->input('adminRole') ? 1 : 0;

            // Save updated admin information
            $admin->save();

            Session::flash('success', 'Admin account updated successfully!');
            return redirect()->route('admin.role.view');
        }
        return redirect()->route('admin.login');
    }

    public function adminRolePermissionPageDelete($id)
    {
        if (Session::has('admin_login_role')) {
            $admin = AdminSignupLoginModel::find($id);
            if ($admin) {
                $admin->delete();
                Session::flash('success', 'Admin account deleted successfully!');
                return redirect()->back();
            } else {
                Session::flash('error', 'Admin account not found!');
                return redirect()->back();
            }
        }
        return redirect()->route('admin.login');
    }
}
