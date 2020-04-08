<?php

use Illuminate\Http\Request;
use App\Http\Controller\Api\Employee;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('employees', 'Ampi\EmployeeController');
Route::apiResource('departments','DepartmentApiController');
Route::apiResource('employees.titles','Api\TitleController')->except(['destroy', 'update']);
Route::get('employees/{employee}/title', 'Api\TitleContoller@current');
//Route::apiResource('employees/{employee}/titles/{from_date}','Api\TitleController');
//Route::apiResource('titles', 'Api\TitleController')->except(['destroy']);

Route::apiResource('salaries', 'Api\SalaryController')->except(['destroy', 'update']);
Route::get('employees/{employee}/salary', 'Api\SalaryContoller@current');
