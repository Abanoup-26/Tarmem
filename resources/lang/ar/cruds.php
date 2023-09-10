<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'title'             => 'العنوان',
            'title_helper'      => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'id',
            'id_helper'          => ' ',
            'title'              => 'العنوان',
            'title_helper'       => ' ',
            'permissions'        => 'الصلاحيات',
            'permissions_helper' => ' ',
            'created_at'         => 'تم الإنشاء في',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم الحذف في',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'id',
            'id_helper'                => ' ',
            'name'                     => 'الأسم',
            'name_helper'              => ' ',
            'email'                    => 'البريد الإلكتروني',
            'email_helper'             => ' ',
            'email_verified_at'        => 'تم التحقق من البريد الإلكتروني في',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'الأدوار',
            'roles_helper'             => ' ',
            'remember_token'           => 'رمز التذكير',
            'remember_token_helper'    => ' ',
            'created_at'               => 'تم الإنشاء في',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تم التحديث في',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تم الحذف في',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'تمت الموافقة',
            'approved_helper'          => ' ',
            'identity_photos'          => 'صور الهوية',
            'identity_photos_helper'   => ' ',
            'position'                 => 'المنصب',
            'position_helper'          => ' ',
            'user_type'                => 'نوع المستخدم',
            'user_type_helper'         => ' ',
            'mobile_number'            => 'رقم الجوال',
            'mobile_number_helper'     => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'id',
            'id_helper'           => ' ',
            'description'         => 'الوصف',
            'description_helper'  => ' ',
            'subject_id'          => 'معرف الموضوع',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'نوع الموضوع',
            'subject_type_helper' => ' ',
            'user_id'             => 'معرف المستخدم',
            'user_id_helper'      => ' ',
            'properties'          => 'الخصائص',
            'properties_helper'   => ' ',
            'host'                => 'المضيف',
            'host_helper'         => ' ',
            'created_at'          => 'تم الإنشاء في',
            'created_at_helper'   => ' ',
            'updated_at'          => 'تم التحديث في',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'تنبيهات المستخدمين',
        'title_singular' => 'تنبيه المستخدم',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'alert_text'        => 'نص التنبيه',
            'alert_text_helper' => ' ',
            'alert_link'        => 'رابط التنبيه',
            'alert_link_helper' => ' ',
            'user'              => 'المستخدمين',
            'user_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
        ],
    ],
    'generalSetting' => [
        'title'          => 'إعدادات عامة',
        'title_singular' => 'إعداد عام',
    ],
    'illnesstype' => [
        'title'          => 'نوع المرض',
        'title_singular' => 'نوع المرض',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contractorType' => [
        'title'          => 'أنواع المقاولين',
        'title_singular' => 'نوع المقاول',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contractorServieceType' => [
        'title'          => 'أنواع خدمات المقاولين',
        'title_singular' => 'نوع خدمة المقاول',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'organizationType' => [
        'title'          => 'أنواع المؤسسات',
        'title_singular' => 'نوع مؤسسة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'organization' => [
        'title'          => 'المؤسسات',
        'title_singular' => 'المؤسسة',
        'fields'         => [
            'id'                           => 'id',
            'id_helper'                    => ' ',
            'organization_name'                         => 'أسم الجهة',
            'organization_name_helper'                  => ' ',
            'website'                      => 'الموقع الإلكتروني',
            'website_helper'               => ' ',
            'mobile_number'                => 'رقم الجوال',
            'mobile_number_helper'         => ' ',
            'phone_number'                 => 'رقم الهاتف',
            'phone_number_helper'          => ' ',
            'email'                        => 'البريد الإلكتروني',
            'email_helper'                 => ' ',
            'organization_type'            => 'نوع المؤسسة',
            'organization_type_helper'     => ' ',
            'created_at'                   => 'تم الإنشاء في',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'تم التحديث في',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'تم الحذف في',
            'deleted_at_helper'            => ' ',
            'commercial_record'            => 'السجل التجاري',
            'commercial_record_helper'     => ' ',
            'partnership_agreement'        => 'عقد الشراكة',
            'partnership_agreement_helper' => ' ',
            'logo'                         =>'الصوره',
            'logo_helper'                  => ' ',
        ],
    ],
    'contractor' => [
        'title'          => 'المقاولين',
        'title_singular' => 'المقاول',
        'fields'         => [
            'id'                        => 'id',
            'id_helper'                 => ' ',
            'position'                  => 'المنصب',
            'position_helper'           => ' ',
            'website'                   => 'الموقع الإلكتروني',
            'website_helper'            => ' ',
            'created_at'                => 'تم الإنشاء في',
            'created_at_helper'         => ' ',
            'updated_at'                => 'تم التحديث في',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'تم الحذف في',
            'deleted_at_helper'         => ' ',
            'commercial_record'         => 'السجل التجاري',
            'commercial_record_helper'  => ' ',
            'safety_certificate'        => 'شهادة السلامة',
            'safety_certificate_helper' => ' ',
            'tax'                       => 'الضرائب',
            'tax_helper'                => ' ',
            'income'                    => 'الدخل',
            'income_helper'             => ' ',
            'social_insurance'          => 'التأمين الاجتماعي',
            'social_insurance_helper'   => ' ',
            'human_resources'           => 'الموارد البشرية',
            'human_resources_helper'    => ' ',
            'bank_certificate'          => 'شهادة بنكية',
            'bank_certificate_helper'   => ' ',
            'commitment_letter'         => 'رسالة التزام',
            'commitment_letter_helper'  => ' ',
            'user'                      => 'المستخدم',
            'user_helper'               => ' ',
            'services'                  => 'الخدمات',
            'services_helper'           => ' ',
            'contractor_type'                  => 'نوع المقاول',
            'contractor_type_helper'           => ' ',
        ],
    ],
    'supporter' => [
        'title'          => 'المانحين',
        'title_singular' => 'مانح',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
        ],
    ],
    'beneficiaryManagement' => [
        'title'          => 'إدارة المستفيدين',
        'title_singular' => 'إدارة المستفيدين',
    ],
    'building' => [
        'title'          => 'المباني',
        'title_singular' => 'المبنى',
        'fields'         => [
            'id'                             => 'id',
            'id_helper'                      => ' ',
            'building_type'                  => 'نوع المبنى',
            'building_type_helper'           => ' ',
            'floor_count'                    => 'عدد الطوابق',
            'floor_count_helper'             => ' ',
            'apartments_count'               => 'عدد الشقق',
            'apartments_count_helper'        => ' ',
            'birth_data'                     => ' تاريخ انشاء المبني',
            'birth_data_helper'              => ' ',
            'latitude'                       => 'خط العرض',
            'latitude_helper'                => ' ',
            'longtude'                       => 'خط الطول',
            'longtude_helper'                => ' ',
            'created_at'                     => 'تم الإنشاء في',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'تم التحديث في',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'تم الحذف في',
            'deleted_at_helper'              => ' ',
            'building_photos'                => 'صور المبنى',
            'building_photos_helper'         => ' ',
            'building_number'                => 'رقم المبنى',
            'building_number_helper'         => ' ',
            'management_statuses'            => 'الحاله الاداريه',
            'management_statuses_helper'     => ' ',
            'rejected_reson'                 => 'سبب الرفض',
            'rejected_reson_helper'          => ' ',
            'stages'                         => 'المراحل',
            'stages_helper'                  => ' ',
            'research_vist_date'             => 'تاريخ زيارة البحث',
            'research_vist_date_helper'      => ' ',
            'research_vist_result'           => 'نتيجة زيارة البحث',
            'research_vist_result_helper'    => ' ',
            'engineering_vist_date'          => 'تاريخ زيارة الهندسة',
            'engineering_vist_date_helper'   => ' ',
            'engineering_vist_result'        => 'نتيجة زيارة الهندسة',
            'engineering_vist_result_helper' => ' ',
            'organization'                   => 'المنظمه التابع لها',
            'organization_helper'            => ' ',
            'project_name'                   => ' اسم المشروع',
            'project_name_helper'            => ' ',
            'buidling_age'                   => ' عمر المبني',
            'buidling_age_helper'            => ' ',
            'name'                           => 'اسم المبني',
            'name_helper'                    => ' ',
            'researchers'                    => 'القائم بالزياره البحثيه',      
            'researchers_helper'             => ' ',
            'engineers'                    => '  القائم بالزياره الهندسيه',      
            'engineers_helper'             => ' ',
        ],
    ],
    'beneficiary' => [
        'title'          => 'المستفيدون',
        'title_singular' => 'المستفيد',
        'fields'         => [
            'id'                        => 'id',
            'id_helper'                 => ' ',
            'name'                      => 'الاسم',
            'name_helper'               => ' ',
            'birth_date'                => 'تاريخ الميلاد',
            'birth_date_helper'         => ' ',
            'identity_number'           => 'رقم الهوية',
            'identity_number_helper'    => ' ',
            'identity_photo'            => 'صورة الهوية',
            'identity_photo_helper'     => ' ',
            'qualifications'            => 'المؤهل الدراسي',
            'qualifications_helper'     => ' ',
            'job_status'                => 'الحاله الوظيفة',
            'job_status_helper'         => ' ',
            'job_title'                 => 'المسمى الوظيفي',
            'job_title_helper'          => ' ',
            'employer'                  => 'جهة العمل',
            'employer_helper'           => ' ',
            'job_salary'                => 'راتب الوظيفة',
            'job_salary_helper'         => ' ',
            'marital_status'            => 'الحالة الاجتماعيه',
            'marital_status_helper'     => ' ',
            'marital_state_date'        => 'تاريخ الحالة الاجتماعيه',
            'marital_state_date_helper' => ' ',
            'address'                   => 'العنوان',
            'address_helper'            => ' ',
            'illness_status'            => 'الحالة المرضيه',
            'illness_status_helper'     => ' ',
            'illness_type'              => 'نوع المرض',
            'illness_type_helper'       => ' ',
            'created_at'                => 'تم الإنشاء في',
            'created_at_helper'         => ' ',
            'updated_at'                => 'تم التحديث في',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'تم الحذف في',
            'deleted_at_helper'         => ' ',
            'building'                  => 'المبنى',
            'building_helper'           => ' ',
        ],
    ],
    'beneficiaryFamily' => [
        'title'          => 'العائلة المستفيدة',
        'title_singular' => 'العائلة المستفيدة',
        'fields'         => [
            'id'                     => 'id',
            'id_helper'              => ' ',
            'name'                   => 'الاسم',
            'name_helper'            => ' ',
            'birth_date'             => 'تاريخ الميلاد',
            'birth_date_helper'      => ' ',
            'identity_number'        => 'رقم الهوية',
            'identity_number_helper' => ' ',
            'identity_photos'        => 'صور الهوية',
            'identity_photos_helper' => ' ',
            'qualifications'         => 'المؤهل الدراسي',
            'qualifications_helper'  => ' ',
            'marital_status'         => 'الحالة الزوجية',
            'marital_status_helper'  => ' ',
            'illness_status'         => 'الحاله المرضيه',
            'illness_status_helper'  => ' ',
            'illness_type'           => 'نوع المرض',
            'illness_type_helper'    => ' ',
            'job_title'             => ' الوظيفه',
            'job_title_helper'      => ' ',
            'job_status'             => 'الحاله الوظيفة',
            'job_status_helper'      => ' ',
            'employer'             => 'جهة العمل  ',
            'employer_helper'      => ' ',
            'job_salary'            => 'راتب الوظيفة',
            'job_salary_helper'     => ' ',
            'created_at'             => 'تم الإنشاء في',
            'created_at_helper'      => ' ',
            'updated_at'             => 'تم التحديث في',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'تم الحذف في',
            'deleted_at_helper'      => ' ',
            'beneficiary'            => 'المستفيد',
            'beneficiary_helper'     => ' ',
            'familyrelation'         => 'العلاقه الاسريه',
            'familyrelation_helper'  => ' ',
        ],
    ],
    'buildingContractor' => [
        'title'          => 'مقاولين المباني',
        'title_singular' => 'مقاول المبنى',
        'fields'         => [
            'id'                                 => 'id',
            'id_helper'                          => ' ',
            'visit_date'                         => 'تاريخ الزيارة',
            'visit_date_helper'                  => ' ',
            'stages'                             => 'المراحل',
            'stages_helper'                      => ' ',
            'contract'                           => 'العقد',
            'contract_helper'                    => ' ',
            'quotation_with_materials'           => 'عرض الأسعار مع المواد',
            'quotation_with_materials_helper'    => ' ',
            'quotation_without_materials'        => 'عرض الأسعار بدون مواد',
            'quotation_without_materials_helper' => ' ',
            'contractor'                         => 'المقاول',
            'contractor_helper'                  => ' ',
            'building'                           => 'المبنى',
            'building_helper'                    => ' ',
            'created_at'                         => 'تم الإنشاء في',
            'created_at_helper'                  => ' ',
            'updated_at'                         => 'تم التحديث في',
            'updated_at_helper'                  => ' ',
            'deleted_at'                         => 'تم الحذف في',
            'deleted_at_helper'                  => ' ',
        ],
    ],
    'city' => [
        'title'          => 'المدن',
        'title_singular' => 'المدينة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'district' => [
        'title'          => 'الأحياء',
        'title_singular' => 'الحي',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'city'              => 'المدينة',
            'city_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'relative' => [
        'title'          => 'صلات القرابة',
        'title_singular' => 'صلة القرابة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'unit' => [
        'title'          => 'أنواع الوحدات',
        'title_singular' => 'نوع وحدة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'buildingSupporter' => [
        'title'          => 'المانحين',
        'title_singular' => 'المانح',
        'fields'         => [
            'id'                      => 'id',
            'id_helper'               => ' ',
            'supporter'               => 'المانح',
            'supporter_helper'        => ' ',
            'building'                => 'المبنى',
            'building_helper'         => ' ',
            'supporter_status'        => 'حالة المانح',
            'supporter_status_helper' => ' ',
            'created_at'              => 'تم الإنشاء في',
            'created_at_helper'       => ' ',
            'updated_at'              => 'تم التحديث في',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'تم الحذف في',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'beneficiaryNeed' => [
        'title'          => 'احتياجات المستفيد',
        'title_singular' => 'احتياج المستفيد',
        'fields'         => [
            'id'                   => 'id',
            'id_helper'            => ' ',
            'unit'                 => 'الوحدة',
            'unit_helper'          => ' ',
            'description'          => 'الوصف',
            'description_helper'   => ' ',
            'trmem_type'           => 'نوع الترميم',
            'trmem_type_helper'    => ' ',
            'photos_before'        => ' الصور قبل الترميم ',
            'photos_before_helper' => ' ',
            'photos_after'         => 'الصور بعد',
            'photos_after_helper'  => ' ',
            'beneficiary'          => 'المستفيد',
            'beneficiary_helper'   => ' ',
            'created_at'           => 'تم الإنشاء في',
            'created_at_helper'    => ' ',
            'updated_at'           => 'تم التحديث في',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'تم الحذف في',
            'deleted_at_helper'    => ' ',
        ],
    ],


];
