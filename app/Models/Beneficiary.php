<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Beneficiary extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'beneficiaries';

    protected $appends = [
        'identity_photo',
    ];

    public const JOB_STATUS_RADIO = [
        'idle'    => 'لا يعمل',
        'emplyee' => 'يعمل',
    ];

    public const ILLNESS_STATUS_RADIO = [
        'safe'    => 'سليم',
        'endemic' => 'مرض مزمن',
    ];

    protected $dates = [
        'birth_date',
        'marital_state_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const MARITAL_STATUS_SELECT = [
        'married'  => 'متزوج',
        'divorced' => 'مطلق',
        'single'   => 'عازب',
    ];

    public const QUALIFICATIONS_SELECT = [
        'High School Diploma' => 'شهادة الثانوية العامة',
        'Bachelor\'s Degree' => 'درجة البكالوريوس',
        'Master\'s Degree' => 'درجة الماجستير',
        'Ph.D.' => 'دكتوراه',
        'Associate Degree' => 'درجة الدبلوم الجامعي',
        'Technical Certificate' => 'شهادة فنية',
        'Vocational Diploma' => 'دبلوم مهني',
        'Professional Certification' => 'شهادة مهنية',
        'Doctor of Medicine (M.D.)' => 'دكتور في الطب',
        'Juris Doctor (J.D.)' => 'دكتور في القانون',
    ];


    protected $fillable = [
        'name',
        'birth_date',
        'identity_number',
        'qualifications',
        'job_status',
        'job_title',
        'job_salary',
        'employer',
        'marital_status',
        'marital_state_date',
        'address',
        'illness_status',
        'apartment',
        'illness_type_id',
        'building_id',
        'family_id',
        'relative_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function familyMembers()
    {
        return $this->hasMany(Beneficiary::class, 'family_id');
    }

    public function beneficiaryBeneficiaryNeeds()
    {
        return $this->hasMany(BeneficiaryNeed::class, 'beneficiary_id');
    }


    public function getBirthDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getIdentityPhotoAttribute()
    {
        $files = $this->getMedia('identity_photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getMaritalStateDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMaritalStateDateAttribute($value)
    {
        $this->attributes['marital_state_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function illness_type()
    {
        return $this->belongsTo(Illnesstype::class, 'illness_type_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function family_relation()
    {
        return $this->belongsTo(Relative::class, 'relative_id');
    }
}
