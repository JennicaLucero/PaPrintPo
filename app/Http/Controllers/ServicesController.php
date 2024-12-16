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
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:100000',
            'quantity' => 'required|integer',
            'comments' => 'nullable|string',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Get the document name and file extension
        $documentName = $request->document_name;
        $fileExtension = $file->getClientOriginalExtension();

        // Generate the custom file name (document_name.extension)
        $fileName = $documentName . '.' . $fileExtension;

        // Store the file with the custom name in the 'uploads' directory (using the 'public' disk)
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        // $filePath = $request->file('file')->store('uploads', 'public');
        // $imagePath = file_exists(public_path($filePath)) ? $filePath : 'images/document.jpg';

        $service = new Service();
        $service->user_id = auth()->id();
        $service->document_name = $request->document_name;
        $service->service_type = $request->service_type;
        $service->file = $filePath;
        $service->quantity = $request->quantity;
        $service->comments = $request->comments;
        $service->save();

        return redirect()->back()->with('success', 'Document submitted successfully!');
    }
}
