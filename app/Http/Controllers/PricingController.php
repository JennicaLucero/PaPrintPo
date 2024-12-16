<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return redirect('/admin/dashboard');
        }
        return view('pricing');
    }
}
