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
    public function get_equipment_info($id)
    {
        $query = EquipmentModel::select(EquipmentModel::raw('
                tbl_equipment.id,
                tbl_equipment.equipment,
                ei.equipment_info
                '))
                ->leftJoin('tbl_equipment_info as ei', 'ei.equipment_id', '=', 'tbl_equipment.id')
                ->leftJoin('tbl_equipment_category as ec', 'ec.id', '=', 'ei.equipment_category_id')
                ->where('tbl_equipment.id', $id)
                ->where('ei.equipment_category_id', 1); // Add this line

             $data = $query->get();

            return response()->json(['data' => $data]);
    }
}
