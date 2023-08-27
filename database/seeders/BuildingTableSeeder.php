<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Building;

class BuildingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed buildings data
        $buildings = [
            [
                'building_type' => 'public',
                'building_number' => 1,
                'floor_count' => 5,
                'apartments_count' => 20,
                'birth_data' => '01/01/2023', // Updated format to "d/m/Y"
                'latitude' => 37.7749,
                'longtude' => -122.4194,
                'management_statuses' => 'on_review',
                'rejected_reson' => null,
                'stages' => 'managment',
                'research_vist_date' => null, // Updated format to "d/m/Y"
                'engineering_vist_date' => null, // Updated format to "d/m/Y"
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            // Add more buildings as needed...
        ];
        // Add more buildings as needed...
        // Loop through the buildings array and create records in the database
        foreach ($buildings as $buildingData) {
            Building::create($buildingData);
        }
    }
}
