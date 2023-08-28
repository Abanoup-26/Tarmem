<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            ContractorTypesTable::class,
            ContractorServieceTypeTableSeeder::class,
            RelativeTableSeeder::class,
            OrganizationTypeTableSeeder::class,
            UnitTableSeeder::class,
            IllnessTypeTableSeeder::class,
            ContractorTableSeeder::class
        ]);
    }
}
