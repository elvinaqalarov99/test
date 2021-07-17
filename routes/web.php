<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $employees = Employee::with('departments')->get();
    $departments = Department::with('employees')->get();
    return view('Admin.index',compact('employees','departments'));
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);