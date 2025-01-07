<?php

namespace App\Http\Controllers\AssetController;

use App\Models\AssetModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AssetController extends Controller
{
    public function getControlNo($cur_year = '2024')
    {
        $results = DB::table('tbl_assets as a')
            ->select(DB::raw('COUNT(*)+1 as control_no'))
            ->whereYear('a.created_at', $cur_year)
            ->first();
        $counter = $results->control_no + 1;

        if ($counter > 9999) {
            $newCounter = $counter;
        } elseif ($counter > 999) {
            $newCounter = '0' . $counter;
        } elseif ($counter < 10) {
            $newCounter = '0000' . $counter;
        } elseif ($counter < 99) {
            $newCounter = '000' . $counter;
        } elseif ($counter > 99 && $counter <= 999) {
            $newCounter = '00' . $counter;
        }
        $controlNo = 'BIOMED-' . $newCounter;
        return response()->json(['control_no' => $controlNo]);
    }
    public function post_asset(Request $req)
    {
        $userId = $req->input('id');
        $clientId = $req->input('clientId');

        // Validate the incoming request data
        $validated = $req->validate([
            'control_no' => 'required|string',
            'qr_code' => 'nullable|string',
            'acct_person' => 'nullable|string',
            'actual_user' => 'nullable|string',
            'employmentType' => 'nullable|string',
            'brand' => 'nullable|string',
            'model' => 'nullable|string',
            'property_no' => 'nullable|string',
            'serial_no' => 'nullable|string',
            'acquisition_cost' => 'nullable|integer',
            'processor' => 'nullable|string',
            'division_id' => 'nullable|integer',
            'selectedEquipmentType' => 'nullable|integer',
            'equipment' => 'nullable|integer',
            'year_acquired' => 'nullable|string',
            'remarks' => 'nullable|string',
            'status' => 'nullable|string',
            'shelf_life' => 'nullable|string',
            'sex' => 'nullable|string',
        ]);

        // Merge with default values for nullable fields
        $data = array_merge([
            'status' => 1, // Default status if not provided
        ], $validated);

        // Insert or update the data in the AssetModel
        $equipment = AssetModel::updateOrCreate(
            ['control_no' => $data['control_no']],
            [
                'encoded_by'         => $userId,
                'client_id'          => $clientId,
                'control_no'         => $data['control_no'],
                'acct_person'        => $data['acct_person'],
                'sex'                => $data['sex'],
                'employmentType'     => $data['employmentType'],
                'brand'              => $data['brand'],
                'model'              => $data['model'],
                'property_no'        => $data['property_no'],
                'serial_no'          => $data['serial_no'],
                'acquisition_cost'   => $data['acquisition_cost'], // Corrected spelling of 'acquisition_cost'
                'processor'          => $data['processor'],
                'division_id'        => $data['division_id'],
                'selectedEquipmentType' => $data['equipment'],
                'actual_user'        => $data['actual_user'],
                'remarks'            => $data['remarks'],
                'year_acquired'      => $data['year_acquired'],
                'shelf_life'         => $data['shelf_life'],
                'status'             => $data['status'],
            ]

        );



        // Return a response with the created ID and a success message
        return response()->json([
            'message' => 'Data saved successfully.',
            'id' => $equipment->id, // Returning the ID of the newly created record
        ], 200);
    }
    public function get_equipment()
    {
        return response()->json(
            DB::table('tbl_equipment')
                ->select(DB::raw('id,equipment'))
                ->get()
        );
    }
    public function get_assets(Request $req)
    {

        $id = $req->query('user_id');

        $asset_opts = DB::table('tbl_assets as s')
            ->leftJoin('users as u', 'u.id', '=', 's.encoded_by')
            ->leftJoin('tbl_department as d', 'd.id', '=', 's.division_id')
            ->leftJoin('tbl_equipment as e', 'e.id', '=', 's.selectedEquipmentType')
            ->select('s.control_no','u.name','s.acct_person','s.sex','s.employmentType','s.serial_no','s.brand','s.model','s.property_no','s.acquisition_cost','d.department','e.equipment','s.remarks','s.year_acquired','s.status')
            ->where('u.id', $id)
            ->get();

            $rowCount = $asset_opts->count();


            return response()->json(
                [
                    'data' => $asset_opts,
                    'count' => $rowCount
                ]
            );

    }
    public function getCountStatus(Request $request, $status = ["Serviceable","Unserviceable"])
    {
        $id = $request->query('userId');

        // Count the number of records for each status (1 = Serviceable, 2 = Unserviceable)
        $counts = DB::table('tbl_assets as a')
        ->leftJoin('users as u', 'u.id', '=', 'a.encoded_by')
        ->select('a.status', DB::raw('count(*) as total'))
        ->whereIn('a.status', $status) // Filters by the given statuses
        ->where('u.id', $id) // Filters by user ID
        ->groupBy('a.status') // Group by asset status
        ->get();
    

        // Format the response to return total count for each status
        $result = [
            'serviceable_count' => 0,  // Default count for Serviceable
            'unserviceable_count' => 0,  // Default count for Unserviceable
        ];

        // Assign the counts to corresponding keys
        foreach ($counts as $count) {
            if ($count->status == "Serviceable") {
                $result['serviceable_count'] = $count->total;
            } elseif ($count->status == "Unserviceable") {
                $result['unserviceable_count'] = $count->total;
            }
        }

        // Return the result as JSON
        return response()->json($result);
    }
    public function getOutdatedEquipment(Request $request)
    {
        $userId = $request->query('userId');

        $outdatedEquipment = DB::table('tbl_assets as a')
            ->leftJoin('users as u', 'u.id', '=', 'a.encoded_by')
            ->select('a.year_acquired')
            ->where('a.year_acquired', '<=', DB::raw('YEAR(CURDATE()) - 5'))
            ->where('u.id', $userId)
            ->get();
        $rowCount = $outdatedEquipment->count();


        // Return the results as a JSON response
        return response()->json(['count' => $rowCount]);
    }
}
