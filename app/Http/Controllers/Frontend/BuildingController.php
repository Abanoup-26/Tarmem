<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildingController extends Controller
{   
    public function index()
    {
        return view('frontend.building');
    }
    public function create()
    {
        return view('frontend.add-building');
    }
}
