<?php

namespace Database\Seeders;

use App\Models\BeneficiaryFamily;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1= BeneficiaryFamily::create([
        'name'=> 'John ',
        'birth_date'=>  Carbon::now()->format('Y-m-d'),
        'identity_number'=> '123456789',
        'qualifications'=> 'Bachelor\'s Degree',
        'marital_status'=>'married',
        'illness_status'=>'safe',
        'illness_type_id'=>null,
        'job_status'=> 'employee',
        'job_sallary' =>5000,
        'beneficiary_id'=>null,
        'familyrelation_id'=>null,
        ]);
        
        $p2= BeneficiaryFamily::create([
        'name'=> 'Moataz',
        'birth_date'=>  Carbon::now()->format('Y-m-d'),
        'identity_number'=> '123456789',
        'qualifications'=> 'Bachelor\'s Degree',
        'marital_status'=>'married',
        'illness_status'=>'safe',
        'illness_type_id'=>null,
        'job_status'=> 'employee',
        'job_sallary' =>5000,
        'beneficiary_id'=>null,
        'familyrelation_id'=>null,
        ]);

        $p3= BeneficiaryFamily::create([
        'name'=> 'Amr ',
        'birth_date'=>  Carbon::now()->format('Y-m-d'),
        'identity_number'=> '123456789',
        'qualifications'=> 'Bachelor\'s Degree',
        'marital_status'=>'married',
        'illness_status'=>'safe',
        'illness_type_id'=>null,
        'job_status'=> 'employee',
        'job_sallary' =>5000,
        'beneficiary_id'=>null,
        'familyrelation_id'=>null,
        ]);
    }
}
