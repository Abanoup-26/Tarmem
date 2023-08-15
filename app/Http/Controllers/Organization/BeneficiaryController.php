<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{   
    public function index()
    {
        return view('organization.beneficiaries');
    }

    public function create() 
    {
        return view('organization.add-beneficiary');
    }

    public function show()
    {
        return view('organization.beneficiaries_show');    
    }
}
