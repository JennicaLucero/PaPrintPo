<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return redirect('/admin/dashboard');
        }
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Validate the incoming request data (you can customize this as needed)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            "phone" => 'required|string',
            'message' => 'required|string',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you for reaching out! We will get back to you soon.');
    }
}
