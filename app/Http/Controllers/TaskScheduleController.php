<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskScheduleModel;
use Illuminate\Support\Facades\DB;


class TaskScheduleController extends Controller
{
    public function fetch_data()
    {
        $EventData = TaskScheduleModel::select(
            'tbl_taskschedule.id',
            'tbl_taskschedule.office',
            'tbl_taskschedule.title',
            'tbl_taskschedule.division_color as color',
            'tbl_taskschedule.description',
            'tbl_taskschedule.venue',
            'tbl_taskschedule.enp',
            'tbl_taskschedule.posted_by',
            'tbl_taskschedule.posteddate',
            'tbl_taskschedule.realenddate',
            'tbl_taskschedule.cancelflag',
            'tbl_taskschedule.status',
            'tbl_taskschedule.isRead',
            'tbl_taskschedule.isGenerateRO',
            'tbl_taskschedule.remarks',
            'tbl_taskschedule.comments',
            'tbl_taskschedule.priority',
            'tbl_taskschedule.program',
            'tbl_taskschedule.is_new',
            'tbl_taskschedule.code_series',
            'tbl_taskschedule.event_reminder',
            'tbl_taskschedule.isSent',
            DB::raw("DATE_FORMAT(tbl_taskschedule.start_date, '%Y-%m-%d') as start"),
            DB::raw("DATE_FORMAT(tbl_taskschedule.end_date, '%Y-%m-%d') as end")
            // DB::raw("CONCAT(users.last_name, ', ', users.first_name) AS fname")
            )
            ->get();
        return response()->json($EventData);
    }
    
    public function fetch_onboard_tech()
    {
        $query = TaskScheduleModel::select(TaskScheduleModel::raw('
        tbl_taskschedule.id,
        tbl_taskschedule.technician_id,
        tbl_taskschedule.start_date,
        tbl_taskschedule.end_date,
        u.name
       
    '))
        ->leftJoin('users as u', 'u.id', '=', 'tbl_taskschedule.technician_id')
        ->orderBy('id', 'DESC');
        $data = $query->get();
        return response()->json($data);
    }
    
    public function post_create_event(Request $req)
    {
   
        $data = new TaskScheduleModel([
            'id'            => null,
            'title'         => $req->input('title'),
            'posted_by'     => $req->input('posted_by'),
            'client_id'     => $req->input('client_id'),
            'technician_id' => $req->input('technician_id'),
            'start_date'    => $req->input('start'),
            'end_date'      =>  $req->input('end'),
            'description'   =>  $req->input('description'),
            'division_color'=> '#0097A7'

        ]);
        $data->save();

        return response()->json(['message' => 'Task created successfully', 'sql_query' => $data], 201);
    }
}
