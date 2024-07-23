<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Notifications\Notifiable;

class JobOrderModel extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = 'tbl_joborder';
    protected $fillable = [
        'id',
        'control_no',
        'request_by',
        'request_date',
        'start_date',
        'completed_date',
        'received_by',
        'particulars',
        'status',
        'updated_at',
        'created_at',
    ];
}
