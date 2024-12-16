<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('user')->get();

        return view('admin.services.index', compact('services'));
    }

    public function updatePrice(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:1',
        ]);

        $service = Service::findOrFail($id);
        if ($service) {
            $service->price = $request->price;
            $service->save();
        }

        return redirect()->route('admin.services')->with('success', 'Price updated successfully.');
    }

    public function sendForApproval($id)
    {
        // Find the submission by ID
        $service = Service::findOrFail($id);

        // Update the status to 'approved'
        $service->status = 'Waiting for Approval';
        $service->save();

        // Redirect back with a success message
        return redirect()->route('admin.services')->with('success', 'Service sent for approval successfully.');
    }

    // public function changeStatus(Request $request, $id)
    // {
    //     $request->validate([
    //         'status' => 'required|in:approved,declined',
    //     ]);

    //     $service = service::find($id);
    //     if ($service) {
    //         $service->status = $request->status;
    //         $service->save();
    //     }

    //     return redirect()->route('admin.services')->with('success', 'Status updated successfully.');
    // }
}
