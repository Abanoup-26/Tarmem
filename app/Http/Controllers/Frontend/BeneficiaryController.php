<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{   
    public function index()
    {
        return view('frontend.beneficiaries');
    }

    public function create() 
    {
        return view('frontend.add-beneficiary');
    }

    public function show()
    {
        return view('frontend.beneficiaries_show');    
    }
}
