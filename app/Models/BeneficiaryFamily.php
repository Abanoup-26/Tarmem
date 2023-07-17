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

class BeneficiaryFamily extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'beneficiary_families';

    protected $appends = [
        'identity_photos',
    ];

    public const JOB_STATUS_RADIO = [
        'idle'     => 'Idle',
        'employee' => 'Employee',
    ];

    protected $dates = [
        'birth_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ILLNESS_STATUS_RADIO = [
        'safe'   => 'سليم',
        'endmic' => 'مرض مزمن',
    ];

    public const MARITAL_STATUS_SELECT = [
        'married' => 'Married',
        'divorce' => 'Divorce',
        'single'  => 'Single',
    ];

    protected $fillable = [
        'name',
        'birth_date',
        'identity_number',
        'qualifications',
        'marital_status',
        'illness_status',
        'illness_type_id',
        'job_status',
        'job_sallary',
        'beneficiary_id',
        'familyrelation_id',
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

    public function getBirthDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getIdentityPhotosAttribute()
    {
        $files = $this->getMedia('identity_photos');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function illness_type()
    {
        return $this->belongsTo(Illnesstype::class, 'illness_type_id');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }

    public function familyrelation()
    {
        return $this->belongsTo(Relative::class, 'familyrelation_id');
    }
}
