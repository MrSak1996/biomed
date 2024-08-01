<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentModel;
use App\Models\ClientModel;
use App\Models\DepartmentModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PMSController extends Controller
{
    public function get_equipment()
    {
        return response()->json(
            EquipmentModel::select(EquipmentModel::raw('id,equipment'))
                ->get()
        );
    }
    public function get_client()
    {
        return response()->json(
            ClientModel::select(ClientModel::raw('id,client,control_no'))
                ->get()
        );
    }
    public function get_department()
    {
        return response()->json(
            DepartmentModel::select(DepartmentModel::raw('id,department'))
                ->get()
        );
    }
}
