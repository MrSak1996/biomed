<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class PMSModel extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = 'tbl_pms';
    protected $fillable = [
        'id',
        'control_no',
        'equipment_id',
        'client_id',
        'department_id',
        'serial_asset_no',
        'model',
        'brand',
        'ppm_date',
        'next_due_date',
        'ppm_end_time',
        'other_info1',
        'other_info2',
        'other_info3',
        'other_info4',
        'other_info5',
        'other_info6',
        'updated_at',
        'created_at',
    ];
    protected $casts = [
        'visual_data' => 'array',
    ];
}
