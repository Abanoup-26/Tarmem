<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 24,
                'title' => 'illnesstype_create',
            ],
            [
                'id'    => 25,
                'title' => 'illnesstype_edit',
            ],
            [
                'id'    => 26,
                'title' => 'illnesstype_show',
            ],
            [
                'id'    => 27,
                'title' => 'illnesstype_delete',
            ],
            [
                'id'    => 28,
                'title' => 'illnesstype_access',
            ],
            [
                'id'    => 29,
                'title' => 'contractor_type_create',
            ],
            [
                'id'    => 30,
                'title' => 'contractor_type_edit',
            ],
            [
                'id'    => 31,
                'title' => 'contractor_type_show',
            ],
            [
                'id'    => 32,
                'title' => 'contractor_type_delete',
            ],
            [
                'id'    => 33,
                'title' => 'contractor_type_access',
            ],
            [
                'id'    => 34,
                'title' => 'contractor_serviece_type_create',
            ],
            [
                'id'    => 35,
                'title' => 'contractor_serviece_type_edit',
            ],
            [
                'id'    => 36,
                'title' => 'contractor_serviece_type_show',
            ],
            [
                'id'    => 37,
                'title' => 'contractor_serviece_type_delete',
            ],
            [
                'id'    => 38,
                'title' => 'contractor_serviece_type_access',
            ],
            [
                'id'    => 39,
                'title' => 'organization_type_create',
            ],
            [
                'id'    => 40,
                'title' => 'organization_type_edit',
            ],
            [
                'id'    => 41,
                'title' => 'organization_type_show',
            ],
            [
                'id'    => 42,
                'title' => 'organization_type_delete',
            ],
            [
                'id'    => 43,
                'title' => 'organization_type_access',
            ],
            [
                'id'    => 44,
                'title' => 'organization_create',
            ],
            [
                'id'    => 45,
                'title' => 'organization_edit',
            ],
            [
                'id'    => 46,
                'title' => 'organization_show',
            ],
            [
                'id'    => 47,
                'title' => 'organization_delete',
            ],
            [
                'id'    => 48,
                'title' => 'organization_access',
            ],
            [
                'id'    => 49,
                'title' => 'contractor_create',
            ],
            [
                'id'    => 50,
                'title' => 'contractor_edit',
            ],
            [
                'id'    => 51,
                'title' => 'contractor_show',
            ],
            [
                'id'    => 52,
                'title' => 'contractor_delete',
            ],
            [
                'id'    => 53,
                'title' => 'contractor_access',
            ],
            [
                'id'    => 54,
                'title' => 'supporter_create',
            ],
            [
                'id'    => 55,
                'title' => 'supporter_edit',
            ],
            [
                'id'    => 56,
                'title' => 'supporter_show',
            ],
            [
                'id'    => 57,
                'title' => 'supporter_delete',
            ],
            [
                'id'    => 58,
                'title' => 'supporter_access',
            ],
            [
                'id'    => 59,
                'title' => 'beneficiary_management_access',
            ],
            [
                'id'    => 60,
                'title' => 'building_show',
            ],
            [
                'id'    => 61,
                'title' => 'building_access',
            ],
            [
                'id'    => 62,
                'title' => 'beneficiary_show',
            ],
            [
                'id'    => 63,
                'title' => 'beneficiary_access',
            ],
            [
                'id'    => 64,
                'title' => 'beneficiary_change',
            ],
            [
                'id'    => 66,
                'title' => 'building_contractor_create',
            ],
            [
                'id'    => 67,
                'title' => 'building_contractor_edit',
            ],
            [
                'id'    => 68,
                'title' => 'building_contractor_show',
            ],
            [
                'id'    => 69,
                'title' => 'building_contractor_delete',
            ],
            [
                'id'    => 70,
                'title' => 'building_contractor_access',
            ],
            [
                'id'    => 71,
                'title' => 'city_create',
            ],
            [
                'id'    => 72,
                'title' => 'city_edit',
            ],
            [
                'id'    => 73,
                'title' => 'city_show',
            ],
            [
                'id'    => 74,
                'title' => 'city_delete',
            ],
            [
                'id'    => 75,
                'title' => 'city_access',
            ],
            [
                'id'    => 76,
                'title' => 'district_create',
            ],
            [
                'id'    => 77,
                'title' => 'district_edit',
            ],
            [
                'id'    => 78,
                'title' => 'district_show',
            ],
            [
                'id'    => 79,
                'title' => 'district_delete',
            ],
            [
                'id'    => 80,
                'title' => 'district_access',
            ],
            [
                'id'    => 81,
                'title' => 'relative_create',
            ],
            [
                'id'    => 82,
                'title' => 'relative_edit',
            ],
            [
                'id'    => 83,
                'title' => 'relative_show',
            ],
            [
                'id'    => 84,
                'title' => 'relative_delete',
            ],
            [
                'id'    => 85,
                'title' => 'relative_access',
            ],
            [
                'id'    => 86,
                'title' => 'unit_create',
            ],
            [
                'id'    => 87,
                'title' => 'unit_edit',
            ],
            [
                'id'    => 88,
                'title' => 'unit_show',
            ],
            [
                'id'    => 89,
                'title' => 'unit_delete',
            ],
            [
                'id'    => 90,
                'title' => 'unit_access',
            ],
            [
                'id'    => 91,
                'title' => 'building_supporter_create',
            ],
            [
                'id'    => 92,
                'title' => 'building_supporter_edit',
            ],
            [
                'id'    => 93,
                'title' => 'building_supporter_show',
            ],
            [
                'id'    => 94,
                'title' => 'building_supporter_delete',
            ],
            [
                'id'    => 95,
                'title' => 'building_supporter_access',
            ],
            [
                'id'    => 96,
                'title' => 'beneficiary_need_show',
            ],
            [
                'id'    => 97,
                'title' => 'beneficiary_need_access',
            ],
            [
                'id'    => 98,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 99,
                'title' => 'Review_and_Approval',
            ],
            [
                'id'    => 100,
                'title' => 'building_update',
            ],
            [
                'id'    => 101,
                'title' => 'managment_stage',
            ],
            [
                'id'    => 102,
                'title' => 'engineering_stage',
            ],
            [
                'id'    => 103,
                'title' => 'research_stage',
            ],
            [
                'id'    => 104,
                'title' => 'contractor_stage',
            ],
            [
                'id'    => 105,
                'title' => 'work_stage',
            ],
            [
                'id'    => 106,
                'title' => 'supporting_stage',
            ],
            [
                'id'    => 107,
                'title' => 'Finance_accreditation',
            ],
            [
                'id'    => 108,
                'title' => 'CEO_Accreditation',
            ],
            [
                'id'    => 112,
                'title' => 'beneficiary_edit',
            ],

        ];
        //  65  and 108 to 112 is free to use 


        Permission::insert($permissions);
    }
}
