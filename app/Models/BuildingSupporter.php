<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingSupporter extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'building_supporters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'supporter_id',
        'building_id',
        'supporter_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SUPPORTER_STATUS_SELECT = [
        'pending'   => 'قيد الأنتظار',      
        'on_review' => 'قيد المراجعة',
        'accepted'  => 'مقبول',
        'rejected'  => 'مرفوض',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function supporter()
    {
        return $this->belongsTo(Supporter::class, 'supporter_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
