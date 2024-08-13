<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class PMSChecklistModel extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = 'tbl_pms_checklist';
    protected $fillable = [
        'id',
        'pms_id',
        'equipment_id',
        'equipment_info_id',
        'equipment_category',
        'is_pass',
        'is_fail',
        'is_na',
        'updated_at',
        'created_at',
    ];
}
