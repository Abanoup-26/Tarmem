<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('supporter.dashboard');    
    }
}
