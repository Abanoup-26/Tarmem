<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'identity_photos'          => 'Identity Photos',
            'identity_photos_helper'   => ' ',
            'position'                 => 'Position',
            'position_helper'          => ' ',
            'user_type'                => 'User Type',
            'user_type_helper'         => ' ',
            'mobile_number'            => 'Mobile Number',
            'mobile_number_helper'     => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'generalSetting' => [
        'title'          => 'General Settings',
        'title_singular' => 'General Setting',
    ],
    'illnesstype' => [
        'title'          => 'Illnesstype',
        'title_singular' => 'Illnesstype',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contractorType' => [
        'title'          => 'Contractor Types',
        'title_singular' => 'Contractor Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contractorServieceType' => [
        'title'          => 'Contractor Serviece Types',
        'title_singular' => 'Contractor Serviece Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'organizationType' => [
        'title'          => 'Organization Types',
        'title_singular' => 'Organization Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'organization' => [
        'title'          => 'Organizations',
        'title_singular' => 'Organization',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'organization_name'                         => 'Organization Name',
            'organization_name_helper'                  => ' ',
            'website'                      => 'Website',
            'website_helper'               => ' ',
            'mobile_number'                => 'Mobile Number',
            'mobile_number_helper'         => ' ',
            'phone_number'                 => 'Phone Number',
            'phone_number_helper'          => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'organization_type'            => 'Organization Type',
            'organization_type_helper'     => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'commercial_record'            => 'Commercial Record',
            'commercial_record_helper'     => ' ',
            'partnership_agreement'        => 'Partnership Agreement',
            'partnership_agreement_helper' => ' ',
        ],
    ],
    'contractor' => [
        'title'          => 'Contractors',
        'title_singular' => 'Contractor',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'position'                  => 'Position',
            'position_helper'           => ' ',
            'website'                   => 'Website',
            'website_helper'            => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'commercial_record'         => 'Commercial Record',
            'commercial_record_helper'  => ' ',
            'safety_certificate'        => 'Safety Certificate',
            'safety_certificate_helper' => ' ',
            'tax'                       => 'Tax',
            'tax_helper'                => ' ',
            'income'                    => 'Income',
            'income_helper'             => ' ',
            'social_insurance'          => 'Social Insurance',
            'social_insurance_helper'   => ' ',
            'human_resources'           => 'Human Resources',
            'human_resources_helper'    => ' ',
            'bank_certificate'          => 'Bank Certificate',
            'bank_certificate_helper'   => ' ',
            'commitment_letter'         => 'Commitment Letter',
            'commitment_letter_helper'  => ' ',
            'user'                      => 'User',
            'user_helper'               => ' ',
            'services'                  => 'Services',
            'services_helper'           => ' ',
            'contractor_type'                  => 'Contractor Type',
            'contractor_type_helper'           => ' ',
        ],
    ],
    'supporter' => [
        'title'          => 'Supporter',
        'title_singular' => 'Supporter',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
        ],
    ],
    'beneficiaryManagement' => [
        'title'          => 'Beneficiary Management',
        'title_singular' => 'Beneficiary Management',
    ],
    'building' => [
        'title'          => 'Buildings',
        'title_singular' => 'Building',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'building_type'                  => 'Building Type',
            'building_type_helper'           => ' ',
            'floor_count'                    => 'Floor Count',
            'floor_count_helper'             => ' ',
            'apartments_count'               => 'Apartments Count',
            'apartments_count_helper'        => ' ',
            'birth_data'                     => 'Birth_Data',
            'birth_data_helper'              => ' ',
            'latitude'                       => 'Latitude',
            'latitude_helper'                => ' ',
            'longtude'                       => 'Longtude',
            'longtude_helper'                => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'building_photos'                => 'Building Photos',
            'building_photos_helper'         => ' ',
            'building_number'                => 'Building Number',
            'building_number_helper'         => ' ',
            'management_statuses'            => 'Management Statuses',
            'management_statuses_helper'     => ' ',
            'rejected_reson'                 => 'Rejected Reson',
            'rejected_reson_helper'          => ' ',
            'stages'                         => 'Stages',
            'stages_helper'                  => ' ',
            'research_vist_date'             => 'Research Vist Date',
            'research_vist_date_helper'      => ' ',
            'research_vist_result'           => 'Research Vist Result',
            'research_vist_result_helper'    => ' ',
            'engineering_vist_date'          => 'Engineering Vist Date',
            'engineering_vist_date_helper'   => ' ',
            'engineering_vist_result'        => 'Engineering Vist Result',
            'engineering_vist_result_helper' => ' ',
        ],
    ],
    'beneficiary' => [
        'title'          => 'Beneficiary',
        'title_singular' => 'Beneficiary',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'birth_date'                => 'Birth Date',
            'birth_date_helper'         => ' ',
            'identity_number'           => 'Identity Number',
            'identity_number_helper'    => ' ',
            'identity_photo'            => 'Identity Photo',
            'identity_photo_helper'     => ' ',
            'qualifications'            => 'Qualifications',
            'qualifications_helper'     => ' ',
            'job_status'                => 'Job Status',
            'job_status_helper'         => ' ',
            'job_title'                 => 'Job Title',
            'job_title_helper'          => ' ',
            'job_salary'                => 'Job Salary',
            'job_salary_helper'         => ' ',
            'marital_status'            => 'Marital Status',
            'marital_status_helper'     => ' ',
            'marital_state_date'        => 'Marital State Date',
            'marital_state_date_helper' => ' ',
            'address'                   => 'Address',
            'address_helper'            => ' ',
            'illness_status'            => 'Illness Status',
            'illness_status_helper'     => ' ',
            'illness_type'              => 'Illness Type',
            'illness_type_helper'       => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'building'                  => 'Building',
            'building_helper'           => ' ',
        ],
    ],
    'beneficiaryFamily' => [
        'title'          => 'Beneficiary Family',
        'title_singular' => 'Beneficiary Family',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'birth_date'             => 'Birth Date',
            'birth_date_helper'      => ' ',
            'identity_number'        => 'Identity Number',
            'identity_number_helper' => ' ',
            'identity_photos'        => 'Identity Photos',
            'identity_photos_helper' => ' ',
            'qualifications'         => 'Qualifications',
            'qualifications_helper'  => ' ',
            'marital_status'         => 'Marital Status',
            'marital_status_helper'  => ' ',
            'illness_status'         => 'Illness Status',
            'illness_status_helper'  => ' ',
            'illness_type'           => 'Illness Type',
            'illness_type_helper'    => ' ',
            'job_status'             => 'Job Status',
            'job_status_helper'      => ' ',
            'job_salary'            => 'Job Sallary',
            'job_salary_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'beneficiary'            => 'Beneficiary',
            'beneficiary_helper'     => ' ',
            'familyrelation'         => 'Familyrelation',
            'familyrelation_helper'  => ' ',
        ],
    ],
    'buildingContractor' => [
        'title'          => 'Building Contractors',
        'title_singular' => 'Building Contractor',
        'fields'         => [
            'id'                                 => 'ID',
            'id_helper'                          => ' ',
            'visit_date'                         => 'Visit Date',
            'visit_date_helper'                  => ' ',
            'stages'                             => 'Stages',
            'stages_helper'                      => ' ',
            'contract'                           => 'Contract',
            'contract_helper'                    => ' ',
            'quotation_with_materials'           => 'Quotation With Materials',
            'quotation_with_materials_helper'    => ' ',
            'quotation_without_materials'        => 'Quotation Without Materials',
            'quotation_without_materials_helper' => ' ',
            'contractor'                         => 'Contractor',
            'contractor_helper'                  => ' ',
            'building'                           => 'Building',
            'building_helper'                    => ' ',
            'created_at'                         => 'Created at',
            'created_at_helper'                  => ' ',
            'updated_at'                         => 'Updated at',
            'updated_at_helper'                  => ' ',
            'deleted_at'                         => 'Deleted at',
            'deleted_at_helper'                  => ' ',
        ],
    ],
    'city' => [
        'title'          => 'Cities',
        'title_singular' => 'City',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'district' => [
        'title'          => 'Districts',
        'title_singular' => 'District',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'city'              => 'City',
            'city_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'relative' => [
        'title'          => 'Relatives',
        'title_singular' => 'Relative',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'unit' => [
        'title'          => 'units',
        'title_singular' => 'unit',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'buildingSupporter' => [
        'title'          => 'Building Supporter',
        'title_singular' => 'Building Supporter',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'supporter'               => 'Supporter',
            'supporter_helper'        => ' ',
            'building'                => 'Building',
            'building_helper'         => ' ',
            'supporter_status'        => 'Supporter Status',
            'supporter_status_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'beneficiaryNeed' => [
        'title'          => 'Beneficiary Needs',
        'title_singular' => 'Beneficiary Need',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'unit'                 => 'Unit',
            'unit_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'trmem_type'           => 'Trmem Type',
            'trmem_type_helper'    => ' ',
            'photos_before'        => 'Photos Before',
            'photos_before_helper' => ' ',
            'photos_after'         => 'Photos After',
            'photos_after_helper'  => ' ',
            'beneficiary'          => 'Beneficiary',
            'beneficiary_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],

];
