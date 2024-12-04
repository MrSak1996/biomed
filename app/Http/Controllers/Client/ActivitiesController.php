<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ActivitiesController extends Controller
{
    public function getClientActivities(Request $req)
    {
        $id = $req->query('user_id');
        $results = DB::table('tbl_taskschedule')
            ->select(DB::raw('c.client,client_id,technician_id,office,title,start_date,end_date'))
            ->leftJoin("tbl_client as c","c.id","=","tbl_taskschedule.client_id")
            ->where('client_id',$id)
            ->get();
        return response()->json($results);
    }
}
