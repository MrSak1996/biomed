<?php

namespace App\Http\Controllers;

use App\Models\ServiceQuotationModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;

class ServiceQuotationController extends Controller
{
    public function post_create_service_quotation(Request $request)
    {
        try {
            $form = new ServiceQuotationModel();

            $form->control_no = $request->control_no;
            $form->client_id = $request->client_id;
            $form->service_type_id = $request->serviceType;
            $form->service_date = $request->date;
            $form->equipment_type_id = $request->equipmentType;
            $form->model = $request->model;
            $form->brand = $request->brand;
            $form->serial_no = $request->serial_no;
            $form->department_id = $request->department;
            $form->complaint = $request->complaint;
            $form->defects = $request->defects;
            $form->work_done = $request->work_done;
            $form->remarks = $request->remarks;
            $form->assessed_by = $request->assessed_by;
            $form->save();

            return response()->json(['message' => 'Form saved successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function get_service_quotation(Request $request)
    {
        try {
            $data = ServiceQuotationModel::select([
                'tbl_service_quotation_info.control_no',
                'tbl_service_type.service_type',
                'tbl_equipment.equipment',
                'tbl_department.department',
                'tbl_client.client',
                'tbl_client.address',
                'tbl_service_quotation_info.service_date as date',
                'tbl_service_quotation_info.model',
                'tbl_service_quotation_info.brand',
                'tbl_service_quotation_info.serial_no',
                'tbl_service_quotation_info.complaint',
                'tbl_service_quotation_info.defects',
                'tbl_service_quotation_info.work_done',
                'tbl_service_quotation_info.remarks',
                'tbl_service_quotation_info.assessed_by'
            ])
                ->leftJoin('tbl_client', 'tbl_client.id', '=', 'tbl_service_quotation_info.client_id')
                ->leftJoin('tbl_service_type', 'tbl_service_type.id', '=', 'tbl_service_quotation_info.service_type_id')
                ->leftJoin('tbl_equipment', 'tbl_equipment.id', '=', 'tbl_service_quotation_info.equipment_type_id')
                ->leftJoin('tbl_department', 'tbl_department.id', '=', 'tbl_service_quotation_info.department_id')
                ->get();

            if ($request->has('export')) {
                return $this->export_service_details($data);
            }

            return response()->json(['data' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function post_save_quotation(Request $request)
    {
        try {
            $rows = $request->input('rows');

            foreach ($rows as $row) {
                // Assuming you have a model for your rows
                $model = new ServiceQuotationModel();
                $model->quantity      = $row['quantity'];
                $model->unit          = $row['unit'];
                $model->description   = $row['description'];
                $model->labor_service = $row['laborService'];
                $model->parts         = $row['parts'];
                $model->total_cost    = $row['totalCost'];
                $model->save();
            }

            return response()->json(['message' => 'Rows saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
