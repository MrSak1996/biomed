<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentModel;
use App\Models\ClientModel;
use App\Models\DepartmentModel;
use App\Models\PMSModel;
use App\Models\PMSChecklistModel;
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
            $data = EquipmentModel::select('tbl_equipment.id', 'tbl_equipment.equipment','ei.id as eid', 'ei.equipment_info')
                ->leftJoin('tbl_equipment_info as ei', 'ei.equipment_id', '=', 'tbl_equipment.id')
                ->leftJoin('tbl_equipment_category as ec', 'ec.id', '=', 'ei.equipment_category_id')
                ->where('tbl_equipment.id', $id)
                ->where('ei.equipment_category_id', $equipmentCat)
                ->get();

            // Add default values to the data if necessary
            foreach ($data as $item) {

                if ($equipmentCat == 1) {
                    $item->category = 1;
                    $item->pass = false;
                    $item->fail = false;
                    $item->na = false;
                } else if ($equipmentCat == 2) {
                    $item->category = 2;
                    $item->pass = false;
                    $item->fail = false;
                    $item->na = false;
                } else if ($equipmentCat == 3) {
                    $item->category = 3;
                    $item->pass = false;
                    $item->fail = false;
                    $item->na = false;
                } else if ($equipmentCat == 4) {
                    $item->category = 4;
                    $item->pass = false;
                    $item->fail = false;
                    $item->na = false;
                }
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
        try {
            $visual_checklist   = $req->input('visual_checklist');
            $cleaning_checklist = $req->input('cleaning_checklist');
            $bm_checklist = $req->input('bm_checklist');
            $est_checklist = $req->input('est_checklist');

        foreach ($visual_checklist as $chklist) {
            $chk = new PMSChecklistModel([
                'equipment_id' => $chklist['id'],
                'equipment_info_id'=> $chklist['eid'],
                'equipment_category' => $chklist['category'],
                'is_pass' => $chklist['pass'],
                'is_fail' => $chklist['fail'],
                'is_na' => $chklist['na'],
            ]);
            $chk->save();
        }

        foreach ($cleaning_checklist as $chklist) {
            $chk = new PMSChecklistModel([
                'equipment_id' => $chklist['id'],
                'equipment_info_id'=> $chklist['eid'],
                'equipment_category' => $chklist['category'],
                'is_pass' => $chklist['pass'],
                'is_fail' => $chklist['fail'],
                'is_na' => $chklist['na'],
            ]);
            $chk->save();
        }

        foreach ($bm_checklist as $chklist) {
            $chk = new PMSChecklistModel([
                'equipment_id' => $chklist['id'],
                'equipment_info_id'=> $chklist['eid'],
                'equipment_category' => $chklist['category'],
                'is_pass' => $chklist['pass'],
                'is_fail' => $chklist['fail'],
                'is_na' => $chklist['na'],
            ]);
            $chk->save();
        }

        foreach ($est_checklist as $chklist) {
            $chk = new PMSChecklistModel([
                'equipment_id' => $chklist['id'],
                'equipment_info_id'=> $chklist['eid'],
                'equipment_category' => $chklist['category'],
                'is_pass' => $chklist['pass'],
                'is_fail' => $chklist['fail'],
                'is_na' => $chklist['na'],
            ]);
            $chk->save();
        }


        $pms_opts = new PMSModel([
            'control_no' => $req->input('control_no'),
            'equipment_id' => $req->input('equipment'),
            'client_id' => $req->input('client'),
            'department_id' => $req->input('department'),
            'brand' => $req->input('brand'),
            'model' => $req->input('model'),
            'serial_asset_no' => $req->input('serial_no')
        ]);
        $pms_opts->save();

            return response()->json(['message' => 'PMS created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
