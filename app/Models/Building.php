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

class Building extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'buildings';

    public const BUILDING_TYPE_SELECT = [
        'public' => 'Public',
        'modern' => 'Modern',
    ];

    protected $appends = [
        'building_photos',
        'research_vist_result',
        'engineering_vist_result',
    ];

    protected $dates = [
        'birth_data',
        'research_vist_date',
        'engineering_vist_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const MANAGEMENT_STATUSES_SELECT = [
        'pending'   => 'Pending',
        'on_review' => 'On Review',
        'accepted'  => 'Accepted',
        'rejected'  => 'Rejected',
    ];

    public const STAGES_SELECT = [
        'managment'          => 'Managment',
        'engineering'        => 'Engineering',
        'research_visit'     => 'Research Visit',
        'engineering_visit'  => 'Engineering Visit',
        'send_to_contractor' => 'send_to_contractor',
        'done'               => 'Done',
        'supporting'         => 'Supporting',
    ];

    protected $fillable = [
        'building_type',
        'building_number',
        'floor_count',
        'apartments_count',
        'birth_data',
        'latitude',
        'longtude',
        'management_statuses',
        'rejected_reson',
        'stages',
        'research_vist_date',
        'engineering_vist_date',
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

    public function buildingBuildingContractors()
    {
        return $this->hasMany(BuildingContractor::class, 'building_id', 'id');
    }

    public function buildingBeneficiaries()
    {
        return $this->hasMany(Beneficiary::class, 'building_id', 'id');
    }

    public function buildingBuildingSupporters()
    {
        return $this->hasMany(BuildingSupporter::class, 'building_id', 'id');
    }

    public function getBirthDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDataAttribute($value)
    {
        $this->attributes['birth_data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBuildingPhotosAttribute()
    {
        return $this->getMedia('building_photos');
    }

    public function getResearchVistDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setResearchVistDateAttribute($value)
    {
        $this->attributes['research_vist_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getResearchVistResultAttribute()
    {
        return $this->getMedia('research_vist_result')->last();
    }

    public function getEngineeringVistDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEngineeringVistDateAttribute($value)
    {
        $this->attributes['engineering_vist_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEngineeringVistResultAttribute()
    {
        return $this->getMedia('engineering_vist_result')->last();
    }
}
