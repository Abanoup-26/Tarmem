<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildingController extends Controller
{   
    public function index()
    {
        return view('organization.building');
    }
    public function create()
    {
        return view('organization.add-building');
    }
}
