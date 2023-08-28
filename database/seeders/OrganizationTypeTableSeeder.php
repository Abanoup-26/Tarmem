<?php

namespace Database\Seeders;

use App\Models\OrganizationType;
use Illuminate\Database\Seeder;

class OrganizationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrganizationType::create([
            'name'=> 'جمعية', 
        ]); 
        OrganizationType::create([
            'name'=> 'مؤسسة', 
        ]);  
    }
}
