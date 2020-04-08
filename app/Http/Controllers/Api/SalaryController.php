<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Salary;
use App\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $employee->salaries;
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Employee $employee
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'salary' => 'integer|min:0'
        ]);
        $salary = $employee->salaries()->where('to_date', '>', now())
                                  ->update(['to_date'=>date_format(now(), 'Y-m-d')]);

        $new_salary = new Title();
        $new_salary->emp_no = $employee->emp_no;
        $new_salary->title = $request->title;
        $new_salary->from_date = date_format(now()), 'Y-m-d');
        $new_salary->to_date = '9999-01-01';
        $new_salary->save();
        return $new_salary;
    }

    /**
     * Display the specified resource.
     * @param \App\Employee $employee
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        return $employee->salaries()->orderBy('to_date', 'desc')->skip($salary - 1)->take(1)->get();
    }

    /**
     * return current salary for a given employee
     * @param Employee $employee
     * @return \Title
     */

    public function current(Employee $employee)
    {
        //
        return $employee->title->orderBy('to_date', 'desc')->first();
    }

}
