<?php

namespace Database\Seeders;

use App\Models\Illnesstype; 
use Illuminate\Database\Seeder;

class IllnessTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Illnesstype::create([
            'name'=> 'سكر', 
        ]); 

        Illnesstype::create([
            'name'=> 'ضغط', 
        ]);  

        Illnesstype::create([
            'name'=> 'قلب', 
        ]);  
    }
}
