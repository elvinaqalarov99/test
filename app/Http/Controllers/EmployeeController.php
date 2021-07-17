<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //eager loading using 'with'
        $employees = Employee::with('departments')->get();
        return view('Admin.employees.index')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('Admin.employees.create')->with('departments',$departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'surname'=>'required|string',
            'salary'=>'sometimes|numeric',
            'gender'=> 'in:Female,Male',
            'departments'=>'required|array'
        ]);

        if ($validator->fails()){
            return response()->json(['success'=>400,'errors'=>$validator->errors()]);
        }
        
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->middle_name = $request->middle_name;
        $employee->gender = $request->gender;
        $employee->salary = $request->salary;
        $res = $employee->save();

        if($res){
            $employee->departments()->sync($request->departments);
            return response()->json(['success'=>200]);
        }else{
            return response()->json(['success'=>400]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $employee = Employee::find($id);

        return view('Admin.employees.edit',compact('departments','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'surname'=>'required|string',
            'salary'=>'sometimes|numeric',
            'gender'=> 'in:Female,Male',
            'departments'=>'required|array'
        ]);

        if ($validator->fails()){
            return response()->json(['success'=>400,'errors'=>$validator->errors()]);
        }
        
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->middle_name = $request->middle_name;
        $employee->gender = $request->gender;
        $employee->salary = $request->salary;
        $res = $employee->save();

        if($res){
            $employee->departments()->sync($request->departments);
            return response()->json(['success'=>200]);
        }else{
            return response()->json(['success'=>400]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        
        $res = $employee->delete();
        
        if($res){
            return response()->json(['success'=>200]);
        }else{
            return response()->json(['success'=>400]);
        }
    }
}