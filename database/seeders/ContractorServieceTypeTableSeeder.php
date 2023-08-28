<?php

namespace Database\Seeders;

use App\Models\ContractorServieceType;
use Illuminate\Database\Seeder;

class ContractorServieceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContractorServieceType::create([
            'name'=> 'بناء', 
        ]);
        
        ContractorServieceType::create([
            'name'=> 'صيانة منشأت', 
        ]);

        ContractorServieceType::create([
            'name'=> 'كهرباء', 
        ]);

        ContractorServieceType::create([
            'name'=> 'نبريد', 
        ]);
    }
}
