<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); // Create a view for login
    }

    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->only('username', 'password');
        
        // Attempt to authenticate using the 'admin' guard
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // Redirect to the admin dashboard or another page after successful login
            return redirect()->route('admin');
        }

        // Return back with errors if authentication fails
        return back()->withErrors([
            'username' => 'Invalid username or password',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
