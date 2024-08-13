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

                // pms checklist data
                $checklist = PMSChecklistModel::select(PMSChecklistModel::raw('
                    tbl_pms_checklist.id,
                    tbl_equipment_info.equipment_info,
                    tbl_pms_checklist.is_pass,
                    tbl_pms_checklist.is_fail,
                    tbl_pms_checklist.is_na,              
                    tbl_pms_checklist.equipment_category         
                '))
                    ->leftJoin('tbl_equipment_category', 'tbl_pms_checklist.equipment_category', '=', 'tbl_equipment_category.id')
                    ->leftJoin('tbl_equipment_info', 'tbl_pms_checklist.equipment_info_id', '=', 'tbl_equipment_info.id')
                    ->where('tbl_pms_checklist.pms_id', $id);
                $checklist_opts = $checklist->get();
                return $this->export_pms_data($data, $checklist_opts);
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

            $pms = PMSModel::select([
                'id',
            ])

                ->orderBy('id', 'desc')
                ->first();
            $pms_id = $pms->id;

            foreach ($visual_checklist as $chklist) {
                $chk = new PMSChecklistModel([
                    'pms_id' => $pms_id,
                    'equipment_id' => $chklist['id'],
                    'equipment_info_id' => $chklist['eid'],
                    'equipment_category' => $chklist['category'],
                    'is_pass' => $chklist['pass'],
                    'is_fail' => $chklist['fail'],
                    'is_na' => $chklist['na'],
                ]);
                $chk->save();
            }

            foreach ($cleaning_checklist as $chklist) {
                $chk = new PMSChecklistModel([
                    'pms_id' => $pms_id,
                    'equipment_id' => $chklist['id'],
                    'equipment_info_id' => $chklist['eid'],
                    'equipment_category' => $chklist['category'],
                    'is_pass' => $chklist['pass'],
                    'is_fail' => $chklist['fail'],
                    'is_na' => $chklist['na'],
                ]);
                $chk->save();
            }

            foreach ($bm_checklist as $chklist) {
                $chk = new PMSChecklistModel([
                    'pms_id' => $pms_id,
                    'equipment_id' => $chklist['id'],
                    'equipment_info_id' => $chklist['eid'],
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
                    'equipment_info_id' => $chklist['eid'],
                    'equipment_category' => $chklist['category'],
                    'is_pass' => $chklist['pass'],
                    'is_fail' => $chklist['fail'],
                    'is_na' => $chklist['na'],
                ]);
                $chk->save();
            }



            return response()->json(['message' => 'PMS created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function export_pms_data($data, $checklist_opts)
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
        $row = 21;
        $cleaning_row = 36; // Starting from the first row for simplicity
        $pms_id        = $data[0]['id'];
        $control_no    = $data[0]['control_no'];
        $equipment     = $data[0]['equipment'];
        $client        = $data[0]['client'];
        $address       = $data[0]['address'];
        $city_province = $data[0]['city_province'];
        $department    = $data[0]['department'];
        $brand         = $data[0]['brand'];
        $model         = $data[0]['model'];
        $serial_no     = $data[0]['serial_no'];
        $ppm_date      = $data[0]['ppm_date'];
        $next_due_date = $data[0]['next_due_date'];

        $sheet->setCellValue('D8', $equipment);
        $sheet->setCellValue('D10', $client);
        $sheet->setCellValue('D11', $address . '' . $city_province);
        $sheet->setCellValue('D12', $department);
        $sheet->setCellValue('N12', $control_no);
        $sheet->setCellValue('D13', $brand);
        $sheet->setCellValue('I13', $model);
        $sheet->setCellValue('N13', $serial_no);
        $sheet->setCellValue('N16', $ppm_date);
        $sheet->setCellValue('N17', $next_due_date);


        foreach ($checklist_opts as $data) {
            $targetRow = ($data['equipment_category'] == 1) ? $row : $cleaning_row;
            $sheet->setCellValue('C' . $targetRow, $data['equipment_info']);
            $sheet->setCellValue('F' . $targetRow, $data['is_pass']);
            $sheet->setCellValue('H' . $targetRow, $data['is_fail']);
            $sheet->setCellValue('J' . $targetRow, $data['is_na']);

            if ($data['equipment_category'] == 1) {
                $row++;
            } else {
                $cleaning_row++;
            }
        }





        // if($item['equipment_category'] == 1)
        // {
        //     // $sheet->setCellValue('C'.$row++,$item['equipment_info']);
        //     // $sheet->setCellValue('F'.$row++,$item['is_pass']);
        //     // $sheet->setCellValue('H'.$row++,$item['is_fail']);
        //     // $sheet->setCellValue('J'.$row++,$item['is_na']);
        // }else if($item['equipment_category'] == 2){
        //     // $sheet->setCellValue('C'.$cleaning_row++,$item['equipment_info']);
        //     // $sheet->setCellValue('F'.$cleaning_row++,$item['is_pass']);
        //     // $sheet->setCellValue('H'.$cleaning_row++,$item['is_fail']);
        //     // $sheet->setCellValue('J'.$cleaning_row++,$item['is_na']);
        // Save the file
        $fileName = $control_no . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        try {
            $writer->save($fileName);
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            return response()->json(['error' => 'Error saving file: ' . $e->getMessage()], 500);
        }

        // // Download the file and delete it after sending
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
