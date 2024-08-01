<?php
use App\Http\Controllers\JobOrderController;
use App\Http\Controllers\TaskScheduleController;
use App\Http\Controllers\PMSController;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::get('generate_control_no', [JobOrderController::class, 'generate_control_no']);
    Route::get('get_job_order_list/{id}', [JobOrderController::class, 'get_job_order_list']);
    Route::get('export_job_order/{id}', [JobOrderController::class, 'get_job_order_list']);
    Route::get('get_job_order_list', [JobOrderController::class, 'get_job_order_list']);

    // Task Schedule
    Route::get('fetch_data',[TaskScheduleController::class, 'fetch_data']);
    Route::get('fetch_onboard_tech',[TaskScheduleController::class, 'fetch_onboard_tech']);
    Route::get('fetch_upcoming_pms',[TaskScheduleController::class, 'fetch_upcoming_pms']);
    Route::get('get_taskdata_list',[TaskScheduleController::class, 'fetch_data']);

    //PMS
    Route::get('get_equipment',[PMSController::class, 'get_equipment']);
    Route::get('get_client',[PMSController::class, 'get_client']);
    Route::get('get_department',[PMSController::class, 'get_department']);
    

});
Route::post('post_create_job_order',[JobOrderController::class,'post_create_job_order']);
Route::post('post_create_event',[TaskScheduleController::class,'post_create_event']);

