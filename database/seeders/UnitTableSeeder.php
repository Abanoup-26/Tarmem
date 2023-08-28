<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create([
            'name'=> 'غرفة', 
        ]); 

        Unit::create([
            'name'=> 'مطبخ', 
        ]);  

        Unit::create([
            'name'=> 'ريسيبشن', 
        ]);  
    }
}
