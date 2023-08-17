<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{   
    public function index()
    {
        $beneficiaries = Beneficiary::with('beneficiaryBeneficiaryFamilies','beneficiaryBeneficiaryNeeds')->get();
        
        return view('organization.beneficiaries' ,compact('beneficiaries'));
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
