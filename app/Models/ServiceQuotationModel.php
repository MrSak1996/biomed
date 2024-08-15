<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class ServiceQuotationModel extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = 'tbl_service_quotation_info';
    protected $fillable = [
        'id',
        'control_no',
        'client_id',
        'service_type_id',
        'equipment_type_id',
        'department_id',
        'complaint',
        'defects',
        'work_done',
        'remarks',
        'assessed_by',
        'updated_at',
        'created_at'
    ];
}
