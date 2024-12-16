<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index()
    {
        return view('printing-services');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_name' => 'required|string|max:255',
            'service_type' => 'required|string',
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:100000', // Allow multiple files
            'quantity' => 'required|integer',
            'comments' => 'nullable|string',
        ]);

        // Get the uploaded files
        $files = $request->file('files'); // Changed to 'files'

        // Initialize an array to hold file paths
        $filePaths = [];


        foreach ($files as $file) {
            
            $documentName = $request->document_name;
            $fileExtension = $file->getClientOriginalExtension();

            // Generate a unique file name (document_name_timestamp.extension)
            $fileName = $documentName . '' . time() . '' . uniqid() . '.' . $fileExtension;

            // Store the file with the custom name in the 'uploads' directory (using the 'public' disk)
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            // Add the file path to the array
            $filePaths[] = $filePath;
        }

        // Create a new service record
        $service = new Service();
        $service->user_id = auth()->id();
        $service->document_name = $request->document_name;
        $service->service_type = $request->service_type;
        $service->files = json_encode($filePaths); // Store file paths as JSON
        $service->quantity = $request->quantity;
        $service->comments = $request->comments;
        $service->save();

        return redirect()->route('submissions')->with('success', 'Documents submitted successfully!');
    }
}