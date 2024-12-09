<?php

namespace App\Http\Controllers\AssetController;

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
}
