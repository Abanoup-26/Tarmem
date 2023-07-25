<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContractorType;
class ContractorTypesTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contractorTypes = [
            ['name' => 'ElectrictionContractor'],
            ['name' => 'ConstructionContractor'],
            ['name' => 'WoodContractor'],
            // Add more data as needed
        ];//
    // Loop through the buildings array and create records in the database
    foreach ($contractorTypes as $contractorTypesData) {
        ContractorType::create($contractorTypesData);
    }
    }
}



