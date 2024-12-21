<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'tbl_assets';

    protected $fillable = [
        'id',
        'client_id',
        'control_no',
        'acct_person',
        'sex',
        'employmentType',
        'brand',
        'model',
        'property_no',
        'serial_no',
        'acquisition_cost',
        'processor',
        'division_id',
        'selectedEquipmentType',
        'actual_user',
        'remarks',
        'year_acquired',
        'shelf_life',
        'status',
        'created_at',
        'updated_at',
    ];
}
