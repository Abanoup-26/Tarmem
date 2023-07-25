<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contractor;
use App\Models\User;
use App\Models\ContractorType;
class ContractorTableSeeder extends Seeder
{

    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            // Create a user for the contractor
            $user = User::create([
                'name' => 'Eppo User ' . $i, // Replace with the contractor's name
                'email' => 'eppo.con' . $i . '@e.com', // Replace with the contractor's email
                'password' => bcrypt('123456'), // Replace 'password' with the desired password
                'user_type' =>'contractor',
                'approved' => 0,
            ]);

            // Create a contractor with its properties and assign it to a contractor type
            $contractorType = ContractorType::find($i);
            Contractor::create([
                'position' => 'Manager '. $i, // Replace with the contractor's position
                'website' => 'https://example.com', // Replace with the contractor's website URL
                'user_id' => $user->id ,
                'contractor_type_id' => $contractorType->id,
            ]);
        }
    }
}
