<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Contractor extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'contractors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'position',
        'website',
        'user_id',
        'contractor_type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'commercial_record',
        'safety_certificate',
        'tax',
        'income',
        'social_insurance',
        'human_resources',
        'bank_certificate',
        'commitment_letter',
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

    public function getCommercialRecordAttribute()
    {
        return $this->getMedia('commercial_record')->last();
    }

    public function getSafetyCertificateAttribute()
    {
        return $this->getMedia('safety_certificate')->last();
    }

    public function getTaxAttribute()
    {
        return $this->getMedia('tax')->last();
    }

    public function getIncomeAttribute()
    {
        return $this->getMedia('income')->last();
    }

    public function getSocialInsuranceAttribute()
    {
        return $this->getMedia('social_insurance')->last();
    }

    public function getHumanResourcesAttribute()
    {
        return $this->getMedia('human_resources')->last();
    }

    public function getBankCertificateAttribute()
    {
        return $this->getMedia('bank_certificate')->last();
    }

    public function getCommitmentLetterAttribute()
    {
        return $this->getMedia('commitment_letter')->last();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services()
    {
        return $this->belongsToMany(ContractorServieceType::class);
    }
    
    public function contractor_type()
    {
        return $this->belongsTo(ContractorType::class, 'contractor_type_id');
    }
}
