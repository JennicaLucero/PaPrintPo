<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\PrintingSupply;

class PrintingSuppliesController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return redirect('/admin/dashboard');

        }
        $supplies = PrintingSupply::all(); // Fetch all supplies from the database
        return view('buy-printing-supplies', compact('supplies'));
    }
}
