<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOrderModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobOrderController extends Controller
{
    const STATUS_DRAFT  = 1;

    public function generate_control_no()
    {
        return response()->json(
            JobOrderModel::select(JobOrderModel::raw('COUNT(*)+1 as "control_no" '))
                ->whereYear('request_date', 2024)
                ->get()
        );
    }
    public function post_create_job_order(Request $req)
    {
        try {
            // Create a new Job Order with the provided data
            $jobOrder = new JobOrderModel([
                'control_no' => $req->input('control_no'),
                'request_date' => $req->input('form_request_date'),
                'start_date' => $req->input('form_start_date'),
                'completed_date' => $req->input('form_completed_date'),
                'received_by' => $req->input('form_received_by'),
                'request_by' => $req->input('form_request_by'),
                'particulars' => $req->input('form_particulars'),
                'status' => self::STATUS_DRAFT,
            ]);

            // Save the Job Order
            $jobOrder->save();

            return response()->json(['message' => 'Job Order created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function get_job_order_list(Request $req, $id = null)
    {
        try {
            // If $id has a value, apply the where clause to filter by ID
            if ($id) {
                $data = JobOrderModel::where('id', $id)->get([
                    'id',
                    'control_no',
                    'request_by',
                    'request_date',
                    'start_date',
                    'completed_date',
                    'particulars',
                    'received_by'
                ]);
            } else {
                // Retrieve all job orders and order them by ID in ascending order
                $data = JobOrderModel::orderBy('id', 'ASC')->get([
                    'id',
                    'control_no',
                    'request_by',
                    'request_date',
                    'start_date',
                    'completed_date',
                    'particulars',
                    'received_by'
                ]);
            }

            if ($req->has('export')) {
                $query = JobOrderModel::select(JobOrderModel::raw('
                id,
                control_no,
                request_by,
                request_date,
                start_date,
                completed_date,
                particulars,
                received_by
                '))
                    ->where('id', $id);
                $data = $query->get();
                return $this->export($data);
            }
            return response()->json(['data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function export($data)
    {
        $templatePath = public_path('templates/job-order.xlsx');
        $spreadsheet = IOFactory::load($templatePath);

        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template file not found.'], 404);
        }

        $spreadsheet = IOFactory::load($templatePath);

        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Initialize row counter
        $row = 1; // Starting from the first row for simplicity
        if (isset($data)) {

            $control_no = $data[0]['control_no'];
            $particulars = $data[0]['particulars'] ?? 'N/A';
            $request_date = $data[0]['request_date'];
            $start_date = $data[0]['start_date'];
            $completed_date = $data[0]['completed_date'];

            $sheet->setCellValue('A10', $request_date);
            $sheet->setCellValue('C10', $start_date);
            $sheet->setCellValue('D10', $completed_date);
            $sheet->setCellValue('A7', "Job Order No:" . $control_no);
            $sheet->setCellValue('B10', $particulars);
        }

        // Save the file
        $fileName = $control_no . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        try {
            $writer->save($fileName);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error saving file: ' . $e->getMessage()], 500);
        }

        // Download the file and delete it after sending
        return response()->download($fileName)->deleteFileAfterSend(true);
    }

    public function get_client_jo(Request $req)
    {
        $id = $req->query('user_id');

        $jo_opts = DB::table('tbl_joborder as jo')
            ->leftJoin('tbl_client as c', 'c.id', '=', 'jo.client_id')
            ->leftJoin('users as u', 'u.id', '=', 'jo.client_id')
            ->select('jo.id', 'jo.control_no', 'c.client', 'jo.particulars', 'jo.request_date', 'u.name')
            ->where('u.id', $id)
            ->get();

        return response()->json($jo_opts);
    }
}
