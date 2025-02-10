<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function redirectToHome()
    {
        return redirect()->route('home');
    }
}
