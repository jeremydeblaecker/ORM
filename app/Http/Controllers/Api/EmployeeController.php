<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::paginate(5)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::create($request->toArray());
        $e = Employee::find($request->emp_no);
        return $e;

        $validatedData = $request->validate([
                'emp_no'=>'integer',
                'birth_date'=>'date',
                'first_name'=>'string|max:255',
                'last_name'=>'string|max:255',
                'gender'=>'string|in:M,F',
                'hire_date'=>'date|after:birth_date',
        ]);
        $employee->save($validatedData);
        return $employee;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->save($request->toArray());
        return $employee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //$employee->delete();
        $e = $employee;
        $employee->delete();
        return $e->toJson();
    }
}
