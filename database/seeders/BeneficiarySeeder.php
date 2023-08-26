<?php

namespace Database\Seeders;

use App\Models\Beneficiary;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ public function run()
    {
        $B1 = Beneficiary::create([
            'name' => 'John Doe',
            'birth_date' => '19/9/2009',
            'identity_number' => '123456789',
            'qualifications' => 'Bachelor\'s Degree',
            'job_status' => 'employee',
            'job_title' => 'Software Developer',
            'job_salary' => 5000,
            'marital_status' => 'married',
            'marital_state_date' => '19/9/2009',
            'address' => '123 Main Street, City',
            'illness_status' => 'safe',
            'illness_type_id' => null, // You might need to adjust this based on your data
            'building_id' => 1, // You might need to adjust this based on your data
        ]);
        $B1->addMediaFromUrl(asset('frontend/img/user.jpg'))->toMediaCollection('identity_photo');
        $B2 = Beneficiary::create([
            'name' => 'Jane Smith',
            'birth_date' => '19/9/2009',
            'identity_number' => '987654321',
            'qualifications' => 'Master\'s Degree',
            'job_status' => 'idle',
            'job_title' => 'Marketing Manager',
            'job_salary' => 6000,
            'marital_status' => 'single',
            'marital_state_date' => '19/9/2009',
            'address' => '456 Elm Street, Town',
            'illness_status' => 'safe',
            'illness_type_id' => null, // You might need to adjust this based on your data
            'building_id' => 1, // You might need to adjust this based on your data
        ]);
        $B2->addMediaFromUrl(asset('frontend/img/user.jpg'))->toMediaCollection('identity_photo');
        $B3 = Beneficiary::create([
            'name' => 'Michael Johnson',
            'birth_date' => '19/9/2009',
            'identity_number' => '555555555',
            'qualifications' => 'High School Diploma',
            'job_status' => 'idle',
            'job_title' => null,
            'job_salary' => null,
            'marital_status' => 'single',
            'marital_state_date' => null,
            'address' => '789 Oak Avenue, Village',
            'illness_status' => 'endemic',
            'illness_type_id' => null, // You might need to adjust this based on your data
            'building_id' => 1, // You might need to adjust this based on your data
        ]);
        $B3->addMediaFromUrl(asset('frontend/img/user.jpg'))->toMediaCollection('identity_photo');
    }
}
