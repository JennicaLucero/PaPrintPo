<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class SubmissionsController extends Controller
{
    public function index()
    {
        $submissions = Service::where('user_id', Auth::id())->get();

        return view('submissions', compact('submissions'));
    }

    public function approve($id)
    {
        // Find the submission by ID
        $submission = Service::findOrFail($id);

        // Update the status to 'approved'
        $submission->status = 'Approved';
        $submission->save();

        // Redirect back with a success message
        return redirect()->route('submissions')->with('success', 'Service approved successfully.');
    }

    public function decline($id)
    {
        // Find the service by ID
        $submission = Service::findOrFail($id);

        // Delete the service record
        $submission->delete();

        // Redirect back with a success message
        return redirect()->route('submissions')->with('success', 'Service declined and deleted successfully.');
    }
}
