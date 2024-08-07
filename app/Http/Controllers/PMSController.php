<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentModel;
use App\Models\ClientModel;
use App\Models\DepartmentModel;
use App\Models\PMSModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Routing\Controller;
use App\Models\PMSChecklistModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PMSController extends Controller
{
    public function get_pms_data(Request $req, $id = null)
    {
        try {
            $data = PMSModel::select([
                'tbl_pms.*',
                'tbl_equipment.equipment',
                'tbl_client.control_no',
                'tbl_client.client',
                'tbl_client.address',
                'tbl_department.department',
                'tbl_pms.created_at as date_created',
                'tbl_pms.ppm_date',
                'tbl_pms.ppm_end_time',
                'tbl_pms.next_due_date'
            ])
                ->leftJoin('tbl_equipment', 'tbl_pms.equipment_id', '=', 'tbl_equipment.id')
                ->leftJoin('tbl_client', 'tbl_pms.client_id', '=', 'tbl_client.id')
                ->leftJoin('tbl_department', 'tbl_pms.department_id', '=', 'tbl_department.id')
                ->get();
            if ($req->has('export')) {
                $query = PMSModel::select(PMSModel::raw('
                    tbl_pms.id,
                    tbl_pms.brand,
                    tbl_pms.model,
                    tbl_pms.serial_asset_no as serial_no,
                    tbl_equipment.equipment,
                    tbl_client.control_no,
                    tbl_client.client,
                    tbl_client.address,
                    tbl_client.city_province,
                    tbl_department.department,
                    tbl_pms.created_at as date_created,
                    tbl_pms.ppm_date,
                    tbl_pms.ppm_end_time,
                    tbl_pms.next_due_date
                '))
                    ->leftJoin('tbl_equipment', 'tbl_pms.equipment_id', '=', 'tbl_equipment.id')
                    ->leftJoin('tbl_client', 'tbl_pms.client_id', '=', 'tbl_client.id')
                    ->leftJoin('tbl_department', 'tbl_pms.department_id', '=', 'tbl_department.id')
                    ->where('tbl_pms.id', $id);
                $data = $query->get();
                return $this->export_pms_data($data);
            }
            return response()->json(['data' => $data]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
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
            $data = EquipmentModel::select('tbl_equipment.id', 'tbl_equipment.equipment', 'ei.id as eid', 'ei.equipment_info')
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
            $bm_checklist       = $req->input('bm_checklist');
            $est_checklist      = $req->input('est_checklist');
            $ppm_date           = $req->input('ppm_date');
            $ppm_end_time       = $req->input('ppm_end_time');
            $next_due_date      = $req->input('next_due_date');
            $other_info1        = $req->input('other_info1');
            $other_info2        = $req->input('other_info2');
            $other_info3        = $req->input('other_info3');
            $other_info4        = $req->input('other_info4');
            $other_info5        = $req->input('other_info5');
            $other_info6        = $req->input('other_info6');

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
                'serial_asset_no' => $req->input('serial_no'),
                'ppm_date' => $req->input('ppm_date'),
                'next_due_date' => $req->input('next_due_date'),
                'ppm_end_time' => $req->input('ppm_end_time'),
                'other_info1' => $req->input('other_info1'),
                'other_info2' => $req->input('other_info2'),
                'other_info3' => $req->input('other_info3'),
                'other_info4' => $req->input('other_info4'),
                'other_info5' => $req->input('other_info5'),
                'other_info6' => $req->input('other_info6')
            ]);
            $pms_opts->save();

            return response()->json(['message' => 'PMS created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function export_pms_data($data)
    {
        $templatePath = public_path('templates/pms.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($templatePath);

        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template file not found.'], 404);
        }

        $spreadsheet = IOFactory::load($templatePath);

        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Initialize row counter
        $row = 1; // Starting from the first row for simplicity

            $control_no = $data[0]['control_no'];
            $equipment = $data[0]['equipment'];
            $client = $data[0]['client'];
            $address = $data[0]['address'];
            $city_province = $data[0]['city_province'];
            $department = $data[0]['department'];
            $brand = $data[0]['brand'];
            $model = $data[0]['model'];
            $serial_no = $data[0]['serial_no'];
            $ppm_date = $data[0]['ppm_date'];
            $next_due_date = $data[0]['next_due_date'];
            // $particulars = $data[0]['particulars'] ?? 'N/A';
            // $request_date = $data[0]['request_date'];
            // $start_date = $data[0]['start_date'];
            // $completed_date = $data[0]['completed_date'];

            $sheet->setCellValue('D8',$equipment);
            $sheet->setCellValue('D10',$client);
            $sheet->setCellValue('D11',$address.''.$city_province);
            $sheet->setCellValue('D12',$department);
            $sheet->setCellValue('N12',$control_no);
            $sheet->setCellValue('D13',$brand);
            $sheet->setCellValue('I13',$model);
            $sheet->setCellValue('N13',$serial_no);
            $sheet->setCellValue('N16',$ppm_date);
            $sheet->setCellValue('N17',$next_due_date);

            
            // $sheet->setCellValue('C10', $start_date);
            // $sheet->setCellValue('D10', $completed_date);
            // $sheet->setCellValue('A7', "Job Order No:" . $control_no);
            // $sheet->setCellValue('B10', $particulars);
        
        // Save the file
        $fileName = $control_no.'.xlsx';
        $writer = new Xlsx($spreadsheet);

        try {
            $writer->save($fileName);
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            return response()->json(['error' => 'Error saving file: ' . $e->getMessage()], 500);
        }

        // Download the file and delete it after sending
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
