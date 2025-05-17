<?php

namespace App\Http\Controllers;

use App\Models\Walkin;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    // Method to show enquiries
    public function showEnquiries()
    {
        // Retrieve all enquiries
        $enquiries = Walkin::all();  // Adjust this to match your actual model

        return view('admin.enquiry', compact('enquiries'));
    }

    // Method to update status of an enquiry
    public function updateStatus(Request $request)
    {
        $enquiry = Walkin::find($request->id);
        if ($enquiry) {
            $enquiry->type = $request->status;
            $enquiry->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    public function showDashboard()
    {
        // Get total enquiries count
        $totalEnquiries = Walkin::count();

        // Get pending enquiries count
        $pendingEnquiries = Walkin::where('type', 'pending')->count();
        $newEnquiries = Walkin::where('type', 'new')->count();

        // Get new enquiries count (assuming you want to define "new" as "created today")
        // $newEnquiries = Enquiry::whereDate('created_at', today())->count();

        // Pass the data to the view
        return view('admin.index', compact('totalEnquiries', 'pendingEnquiries', 'newEnquiries'));
    }
}
