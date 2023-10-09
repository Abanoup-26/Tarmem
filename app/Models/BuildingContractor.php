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

class BuildingContractor extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    protected $appends = [
        'contract',
    ];

    public $table = 'building_contractors';

    protected $dates = [
        'visit_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STAGES_SELECT = [
        'pending'          => 'زيارة هندسية', //لسه ضايف المقاول للمبني 
        'request_quotation' => 'طلب عرض سعر', //
        'send_quotation'    => 'تم تحديد السعر ',
        'accepted'          => 'قبول',
        'rejected'          => 'رفض',
    ];

    public const STAGES_2_SELECT = [ // for contractor dashboard purpose
        'pending'          => 'زيارة هندسية', //لسه ضايف المقاول للمبني 
        'request_quotation' => 'في أنتطار عرض سعرك',
        'send_quotation'    => 'تم أرسال السعر للأدارة',
        'accepted'          => 'تم قبولك',
        'rejected'          => 'تم رفضك',
    ];

    protected $fillable = [
        'visit_date',
        'stages',
        'contractor_id',
        'building_id',
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

    public function getVisitDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVisitDateAttribute($value)
    {
        $this->attributes['visit_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getContractAttribute()
    {
        return $this->getMedia('contract')->last();
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
    public function getHasContractAttribute()
    {
        return $this->getMedia('contract')->isNotEmpty();
    }
}
