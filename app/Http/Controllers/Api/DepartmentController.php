<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Salary;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Department::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'dept_no' => 'required|regex:/^d[0-9]{3}$/|unique:departments, dept_no',
            'dept_name' => 'required|string:255|unique:departments, dept_name',
        ]);
        $department= new Department();
        $department->dept_no = $validatedData->dept_no;
        $department->dept_name = $validatedData->dept_name;
        $department->save();
        return $department;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
        return $Department;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        $validatedData = $request->validate([
            'dept_name' => ['required]',
        ]);
        $department->dept_name = $validatedData->dept_name;
        $department->save();
        return $department;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
        $d = $department;
        $department->delete();
        return $d;
    }
}
