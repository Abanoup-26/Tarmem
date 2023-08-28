<?php

namespace Database\Seeders;

use App\Models\Relative;
use Illuminate\Database\Seeder;

class RelativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Relative::create([
            'name'=> 'أخ/ة', 
        ]);
        
        Relative::create([
            'name'=> 'عم/ة', 
        ]);

        Relative::create([
            'name'=> 'خال/ة', 
        ]);

        Relative::create([
            'name'=> 'زوج/ة', 
        ]);
    }
}
