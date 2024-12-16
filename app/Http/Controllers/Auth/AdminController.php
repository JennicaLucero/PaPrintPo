<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PrintingSupply;
use App\Models\Service;
use App\Models\Order;
use App\Models\Contact;

class AdminController extends Controller
{
    public function dashboard()
    {
        // dd(Auth::user()->usertype);

        if (Auth::check() && Auth::user()->usertype === 'admin') {
            $userCount = User::count();
            $serviceCount = Service::count();
            $orderCount = Order::count();
            $contactCount = Contact::count();
            
            return view('admin.dashboard', compact('userCount', 'serviceCount', 'orderCount', 'contactCount'));
        }
        return redirect('/')->with('error', 'Unauthorized access.');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function services()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function orders()
    {
        $orders = Order::latest()->get();
        return view('admin.orders', compact('orders'));
    }

    public function contactMessages()
    {
        $messages = Contact::latest()->get();
        return view('admin.contact', compact('messages'));
    }
}
