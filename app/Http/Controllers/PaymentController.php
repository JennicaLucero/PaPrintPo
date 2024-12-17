<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    private $secretKey;
    private $baseUrl = 'https://api.paymongo.com/v1';

    public function __construct()
    {
        $this->secretKey = 'sk_test_xizYrA5Evroe8ZeMCFADBWLm';
    }

    public function createPaymentIntent(Request $request)
    {
        $userpetId = $request->userpet_id;
        $userId = $request->user_id;


        $response = Http::withBasicAuth($this->secretKey, '')
            ->post($this->baseUrl . '/payment_intents', [
                'data' => [
                    'attributes' => [
                        'amount' => $request->amount * 100,
                        'payment_method_allowed' => ['card'],
                        'currency' => 'PHP',
                        'metadata' => [
                            'user_id' => (string) $userId,  // Current authenticated user
                            'userpet_id' => (string) $userpetId, // UserPet ID (your link between user and pet)
                        ]
                    ]
                ]
            ]);

        return response()->json($response->json());
    }

    public function createPaymentMethod(Request $request)
    {
        // $user = User::find($request->user_id);

        // dd(Auth::guard('sanctum')->check());
        $response = Http::withBasicAuth($this->secretKey, '')
            ->post($this->baseUrl . '/payment_methods', [
                'data' => [
                    'attributes' => [
                        'type' => 'card',
                        'details' => [
                            'card_number' => $request->card_number,
                            'exp_month' => $request->exp_month,
                            'exp_year' => $request->exp_year,
                            'cvc' => $request->cvc,
                        ],
                        'billing' => [
                            'name' => $request->user_name,
                            'email' => $request->user_email,
                        ],
                    ],
                ],
            ]);
    
        return response()->json($response->json());
    }
    
    

    public function attachPaymentIntent(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'user_id' => 'required',
            'payment_intent_id' => 'required|string',
            'payment_method_id' => 'required|string',
        ]);
    
        // $user = User::find($request->user_id);
        
        // Log the received request data for debugging purposes
        \Log::info('Request Data: ' . json_encode($request->all()));
    
        // Base amount (1,000 PHP)
        $baseAmount = 1000;
    
        // Add 5% service fee
        $serviceFee = $baseAmount * 0.05;
        $totalAmount = $baseAmount + $serviceFee;
    
        // Send request to PayMongo to attach payment method
        $response = Http::withBasicAuth($this->secretKey, '')
            ->post($this->baseUrl . '/payment_intents/' . $request->payment_intent_id . '/attach', [
                'data' => [
                    'attributes' => [
                        'payment_method' => $request->payment_method_id
                    ]
                ]
            ]);
    
        // Check if the response is successful
        if ($response->successful()) {
            try {
                DB::beginTransaction();
    
                // Extract the transaction ID and userpet_id from response
                $transactionId = $response['data']['id'];
                $userpetId = $response['data']['attributes']['metadata']['userpet_id'];
    
                // Find UserPet
                $userPet = UserPet::find($userpetId);
                if (!$userPet) {
                    \Log::error('User Pet not found for ID: ' . $userpetId);
                    DB::rollBack();
                    return response()->json(['error' => 'User Pet not found'], 404);
                }
    
                // Create the transaction record
                Transaction::create([
                    'transaction_id' => $transactionId,
                    'user_id' => $request->user_id,
                    'userpet_id' => $userpetId,
                    'amount' => $totalAmount * 100, // Amount in cents
                    'payment_method' => 'card',
                ]);
    
                DB::commit();
                return response()->json($response->json()); // Return success response
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('Transaction Error: ' . $e->getMessage());
                return response()->json(['error' => 'Payment processing failed. Please try again.'], 500);
            }
        } else {
            \Log::error('PayMongo response error: ' . $response->status() . ' - ' . $response->body());
            return response()->json(['error' => 'Payment attachment failed. Please try again.'], 400);
        }
    }


    public function createGCashPayment(Request $request)
{
    

    // Step 1: Create a new GCash payment method
    $paymentMethodResponse = $this->createGCashPaymentMethod($request);
    if ($paymentMethodResponse->status() !== 200) {
        return $paymentMethodResponse; // Handle error
    }

    // Step 2: Create a new payment intent
    $paymentIntentResponse = $this->createGCashPaymentIntent($request);
    if ($paymentIntentResponse->status() !== 200) {
        return $paymentIntentResponse; // Handle error
    }

    // Step 3: Attach the payment method to the payment intent
    $paymentIntentId = $paymentIntentResponse->json()['data']['id'];
    $paymentMethodId = $paymentMethodResponse->json()['data']['id'];

    return $this->attachGCashPaymentIntent($request, $paymentIntentId, $paymentMethodId);
}
        public function createGCashPaymentIntent(Request $request)
        {
            
            // Validate input
            $validator = Validator::make($request->all(), [
                'amount' => 'required|numeric|min:1',
                'userpet_id' => 'required|exists:user_pets,id',
                'user_id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $userpetId = $request->userpet_id;
            $userId = $request->user_id;
    
            $response = Http::withBasicAuth($this->secretKey, '')
                ->post($this->baseUrl . '/payment_intents', [
                    'data' => [
                        'attributes' => [
                            'amount' => $request->amount * 100,
                            'payment_method_allowed' => ['gcash'],
                            'currency' => 'PHP',
                            'metadata' => [
                                'user_id' => (string) $userId,
                                'userpet_id' => (string) $userpetId,
                            ],
                            'redirect' => [
                                'return_url' => 'https://straysconnect.com/petlisting?success=true',
                            ]
                        ]
                    ]
                ]);
                
            // Debugging: Log the response
            \Log::info('GCash Payment Intent Response:', $response->json());
    
            return response()->json($response->json());
        }
    
        // Create GCash Payment Method
        public function createGCashPaymentMethod(Request $request)
        {
            // Validate input
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'mobile_number' => 'required|string|max:15', // Adjust max length as needed
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $name = $request->user_name;
            $email = $request->user_email;
    
            $response = Http::withBasicAuth($this->secretKey, '')
                ->post($this->baseUrl . '/payment_methods', [
                    'data' => [
                        'attributes' => [
                            'type' => 'gcash',
                            'billing' => [
                                'name' => $name,
                                'email' => $email,
                                'phone' => $request->mobile_number
                            ]
                        ]
                    ]
                ]);
    
            // Debugging: Log the response
            \Log::info('GCash Payment Method Response:', $response->json());
    
            return response()->json($response->json());
        }
    
        // Attach GCash Payment Intent
        public function attachGCashPaymentIntent(Request $request)
        {
            // Validate input
            $validator = Validator::make($request->all(), [
                'payment_intent_id' => 'required|string',
                'payment_method_id' => 'required|string',
                'user_id' => 'required',
                'mobile_number' => 'required|string|max:15', // Adjust max length as needed
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $baseAmount = 1000; // Example base amount
            $serviceFee = $baseAmount * 0.05;
            $totalAmount = $baseAmount + $serviceFee;
    
            $response = Http::withBasicAuth($this->secretKey, '')
            ->post($this->baseUrl . '/payment_intents/' . $request->payment_intent_id . '/attach', [
                'data' => [
                    'attributes' => [
                        'payment_method' => $request->payment_method_id,
                        'redirect' => [
                            'return_url' => 'https://straysconnect.com/petlisting?payment_intent_id=' . $request->payment_intent_id . '&success=true',
                        ],
                        'billing' => [
                            'name' => $request->user_name,
                            'email' => $request->user_email,
                            'phone' => $request->mobile_number,
                        ],
                        'return_url' => 'https://straysconnect.com/petlisting?success=true',

                    ],
                ],
            ]);
    
        // Log the response
        \Log::info('Attach GCash Payment Intent Response:', $response->json());
    
        if ($response->successful()) {
            try {
                DB::beginTransaction();
                $responseData = $response->json();
                $transactionId = $responseData['data']['id'];
    
                $userpetId = $responseData['data']['attributes']['metadata']['userpet_id'];
                $userPet = UserPet::find($userpetId);
    
                Transaction::create([
                    'transaction_id' => $transactionId,
                    'user_id' => $request->user_id,
                    'userpet_id' => $userpetId,
                    'amount' => $totalAmount * 100, // Amount in cents
                    'payment_method' => 'gcash',
                ]);
    
                DB::commit();
    
                // Check if there is a next action required
                if (isset($responseData['data']['attributes']['next_action'])) {
                    $nextAction = $responseData['data']['attributes']['next_action'];
    
                    // Handle the next action (e.g., redirect the user)
                    if (isset($nextAction['redirect'])) {
                        return response()->json([
                            'redirect_url' => $nextAction['redirect']['url'],
                            'message' => 'Please complete the payment in the GCash app.',
                        ]);
                    }
                } else {
                    // Handle successful payment
                    return response()->json(['message' => 'Payment successful!']);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('Transaction Error:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
                return response()->json(['error' => 'Transaction failed. Please try again.'], 500);
            }
        } else {
            return response()->json(['error' => 'Failed to attach payment intent.'], 500);
        }
    }
}