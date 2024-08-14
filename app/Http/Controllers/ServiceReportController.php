<?php

namespace App\Http\Controllers;

use App\Models\ServiceReportModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;

class ServiceReportController extends Controller
{
    public function post_create_service_details(Request $request)
    {
        try {
            $form = new ServiceReportModel();
            $form->service_type = $request->serviceType;
            $form->client_id = $request->client_id;
            $form->service_date = $request->date;
            $form->equipment_type = $request->equipmentType;
            $form->model = $request->model;
            $form->brand = $request->brand;
            $form->serial_no = $request->serialNo;
            $form->location = $request->location;
            $form->problem_reported = $request->problemReported;
            $form->service_rendered = $request->serviceRendered;
            $form->defects_found = $request->defectsFound;
            $form->action_taken = $request->actionTaken;
            $form->status_after_service = $request->statusAfterService;
            $form->engineers_remarks = $request->engineersRemarks;

            $form->save();

            return response()->json(['message' => 'Form saved successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function get_service_details(Request $req)
    {
        try {
            $data = ServiceReportModel::select([
                'tbl_service_details.id',
                'tbl_service_details.service_type',
                'tbl_client.client',
                'tbl_client.address',
                'tbl_service_details.service_date',
                'tbl_service_details.equipment_type',
                'tbl_service_details.model',
                'tbl_service_details.brand',
                'tbl_service_details.serial_no',
                'tbl_service_details.location',
                'tbl_service_details.problem_reported',
                'tbl_service_details.service_rendered',
                'tbl_service_details.defects_found',
                'tbl_service_details.action_taken',
                'tbl_service_details.status_after_service',
                'tbl_service_details.engineers_remarks',
                'tbl_service_details.updated_at',
                'tbl_service_details.created_at'
            ])
                ->leftJoin('tbl_client', 'tbl_service_details.client_id', '=', 'tbl_client.id')
                ->get();
                if ($req->has('export')) {
                    return $this->export_service_details($data);
                }

            return response()->json(['data' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function post_update_service_details(Request $request)
    {
        ServiceReportModel::where('id', $request->input('id'))
            ->update([
                'warranty'      => $request->input('warranty'),
                'work_started'  => $request->input('workStarted'),
                'work_completed'=> $request->input('workCompleted'),
                'date'          => $request->input('date'),
                'remarks'       => $request->input('remarks'),
            ]);
        return response()->json(['message' => 'Update successfully']);
    }

    public function export_service_details($data)
    {
        $templatePath = public_path('templates/service-report.xlsx');
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
        $service_type       = $data[0]['service_type'];
        $date               = $data[0]['date'];
        $client             = $data[0]['client'];
        $address            = $data[0]['address'];
        $equipment_type     = $data[0]['equipment_type'];
        $model              = $data[0]['model'];
        $brand              = $data[0]['brand'];
        $serial_no          = $data[0]['serial_no'];
        $problem_reported   = $data[0]['problem_reported'];
        $location           = $data[0]['location'];
        $service_rendered   = $data[0]['service_rendered'];
        $defect_found       = $data[0]['defect_found'];
        $action_taken       = $data[0]['action_taken'];
        $status_after_service= $data[0]['status_after_service'];
        $engineer_remarks    = $data[0]['engineer_remarks'];
 

        $sheet->setCellValue('D6', $service_type);
        $sheet->setCellValue('H6', $date);
        $sheet->setCellValue('C7', $client);
        $sheet->setCellValue('C8', $address);
        $sheet->setCellValue('C12', $equipment_type);
        $sheet->setCellValue('C13', $brand);
        $sheet->setCellValue('H12', $model);
        $sheet->setCellValue('H13', $serial_no);
        $sheet->setCellValue('D17', $problem_reported);
        $sheet->setCellValue('D18', $location);
        $sheet->setCellValue('C21', $service_rendered);
        $sheet->setCellValue('C24', $defect_found);
        $sheet->setCellValue('C28', $action_taken);
        $sheet->setCellValue('C32', $status_after_service);
        $sheet->setCellValue('C33', $engineer_remarks);

        $fileName = 'service-report.xlsx';
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
