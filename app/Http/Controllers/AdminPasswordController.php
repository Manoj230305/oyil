<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminPasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('admin.changepassword');  // Return the change password view
    }

    public function changePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',  // Minimum 8 chars & confirm new password
        ]);

        // Get the currently authenticated admin
        $admin = Auth::guard('admin')->user();
    
        // Check if the old password matches
        if (!Hash::check($request->old_password, $admin->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Old password is incorrect.',
            ]);
        }

        // Update the password
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return response()->json([
            'success' => true,
            'message' => 'Password successfully updated.',
        ]);
    }
}
