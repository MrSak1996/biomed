<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class ServiceReportModel extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = 'tbl_service_details';
    protected $fillable = [
        'id',
        'service_type',
        'client_id',
        'service_date',
        'equipment_type',
        'model',
        'brand',
        'serial_no',
        'location',
        'problem_reported',
        'service_rendered',
        'defects_found',
        'action_taken',
        'status_after_service',
        'engineers_remarks',
        'waranty',
        'work_started',
        'work_completed',
        'date',
        'remarks',
        'updated_at',
        'created_at'
    ];
}
