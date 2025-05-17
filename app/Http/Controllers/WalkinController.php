<?php

namespace App\Http\Controllers;

use App\Models\Walkin;
use Illuminate\Http\Request;

class WalkinController extends Controller
{
    // Show the form to add walkin
    public function showForm()
    {
        return view('admin.walkin');  // Assuming your form is in a Blade file called 'add-walkin.blade.php'
    }

    // Handle the form submission and insert into the database
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone-number' => 'required|numeric',
            'email' => 'nullable|email',
            'message' => 'nullable|string|max:3000',
        ]);

        // Create a new walkin record
        $walkin = Walkin::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone-number'],
            'email' => $validated['email'] ?? null,  // Email can be null
            'message' => $validated['message'] ?? '',  // Default message is 'Walk in'
            'type' => 'new',  // Default type is 'new', can be changed based on the form input if needed
        ]);

        // Redirect or respond with a success message
        if(request()->path() == 'add-walkin')
            return redirect()->route('walkin.form')->with('success', 'Walk-in added successfully!');

        return redirect()->route('user.home')->with('success', 'Walk-in added successfully!');

    }
}
