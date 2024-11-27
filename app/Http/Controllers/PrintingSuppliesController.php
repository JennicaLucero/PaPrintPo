<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintingSupply;

class PrintingSuppliesController extends Controller
{
    public function index()
    {
        $supplies = PrintingSupply::all(); // Fetch all supplies from the database
        return view('buy-printing-supplies', compact('supplies'));
    }
}
