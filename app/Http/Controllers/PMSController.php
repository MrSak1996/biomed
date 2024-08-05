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
    public function get_equipment_info($id, Request $request)
    {
        // Validate the equipment_cat parameter
        $validatedData = $request->validate([
            'equipment_cat' => 'required|integer|exists:tbl_equipment_category,id'
        ]);
    
        $equipmentCat = $validatedData['equipment_cat'];
    
        try {
            $data = EquipmentModel::select('tbl_equipment.id', 'tbl_equipment.equipment', 'ei.equipment_info')
                ->leftJoin('tbl_equipment_info as ei', 'ei.equipment_id', '=', 'tbl_equipment.id')
                ->leftJoin('tbl_equipment_category as ec', 'ec.id', '=', 'ei.equipment_category_id')
                ->where('tbl_equipment.id', $id)
                ->where('ei.equipment_category_id', $equipmentCat)
                ->get();
    
            // Add default values to the data if necessary
            foreach ($data as $item) {
                $item->pass = false;
                $item->fail = false;
                $item->na = false;
            }
    
            return response()->json(['data' => $data]);
    
        } catch (\Exception $e) {
            // Log the exception and return an error response
            \Log::error('Error fetching equipment info: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching equipment info.'], 500);
        }
    }

    public function post_preventive_maintenance(Request $req)
    {
        
    }
    
}