<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\User;
use App\Models\FileCheckout;
use GuzzleHttp\Client;

class FileCheckoutController extends Controller
{
    public function show($id) {
        // Find the service or item the user is checking out
        $submission = Service::findOrFail($id);
        
        // Show the checkout page, passing the service data to the view
        return view('fileCheckout', compact('submission'));
    }
    
    public function showCheckout(Request $request)
    {

        $submission = Service::findOrFail($request->submission_id);

        // Get the current user
        $user = auth()->user();
    
        // Retrieve submission(s) by IDs passed in the request
        $submissionIds = $request->input('submission_ids');
        $approvedsubmissions = Service::whereIn('id', explode(',', $submissionIds))
            ->where('user_id', $user->id)
            ->where('status', 'Approved') // Optional: Only fetch approved submissions
            ->get();
    
        // Pass the user details and submissions to the view
        return view('fileCheckout', [
            'user' => $user,
            'approvedsubmissions' => $approvedsubmissions,
        ]);
    }

    public function store(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'delivery_type' => 'required|string',
            'payment_type' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($request->payment_type === 'Gcash') {
            $client = new Client();
            $response = $client->post('https://api.paymongo.com/v1/sources', [
                'auth' => [config('services.paymongo.secret_key'), ''],
                'json' => [
                    'data' => [
                        'attributes' => [
                            'amount' => $request->price * 100,
                            'currency' => 'PHP',
                            'type' => 'gcash',
                            'redirect' => [
                                'success' => route('submissions'),
                                'failed' => route('submissions'),
                            ],
                        ],
                    ],
                ],
            ]);

            $sourceData = json_decode($response->getBody(), true);

        // Create a new file checkout entry in the database
        $fileCheckout = new FileCheckout();
        $fileCheckout->user_id = Auth::id(); // Assuming user is authenticated
        $fileCheckout->service_id = $id; // The ID of the service being checked out
        $fileCheckout->name = $request->user_name;
        $fileCheckout->address = $request->address;
        $fileCheckout->mobile_number = $request->phone;
        $fileCheckout->delivery_type = $request->delivery_type;
        $fileCheckout->payment_type = $request->payment_type;
        $fileCheckout->price = $request->price;
        $fileCheckout->order_status = 'Pending'; // Initial status before admin approves
        $fileCheckout->save();

        // Change the service status to 'Approved'
        $service = Service::findOrFail($id);
        $service->status = 'Approved'; // Change status to Approved
        $service->save();

        // Redirect back to the submissions page
        return redirect($sourceData['data']['attributes']['redirect']['checkout_url']);

        } elseif ($request->payment_type === 'Cash') {
            // Create a new file checkout entry in the database
        $fileCheckout = new FileCheckout();
        $fileCheckout->user_id = Auth::id(); // Assuming user is authenticated
        $fileCheckout->service_id = $id; // The ID of the service being checked out
        $fileCheckout->name = $request->user_name;
        $fileCheckout->address = $request->address;
        $fileCheckout->mobile_number = $request->phone;
        $fileCheckout->delivery_type = $request->delivery_type;
        $fileCheckout->payment_type = $request->payment_type;
        $fileCheckout->price = $request->price;
        $fileCheckout->order_status = 'Pending'; // Initial status before admin approves
        $fileCheckout->save();

        // Change the service status to 'Approved'
        $service = Service::findOrFail($id);
        $service->status = 'Approved'; // Change status to Approved
        $service->save();

        return redirect('/submissions')->with('success', 'Checkout successful and service approved!');
        }
    }
}
