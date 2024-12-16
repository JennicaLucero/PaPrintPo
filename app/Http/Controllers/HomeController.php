<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return redirect('/admin/dashboard');
        }
        return view('home.index');
    }

    public function home()
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return redirect('/admin/dashboard');
        }
        return view('home.index');
    }

}
