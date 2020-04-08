<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Title;
use App\Employee;
//use Illuminate\Http\Request;
use App\Http\Request\Api\TitleRequest as Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param Employee $employee
     *@return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        return $employee->titles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate(
            'title'
        );

        $title = $employee->titles->where('to_date', '>', now())
                                  ->update(['to_date'=>date_format(now(), 'Y-m-d')]);

        $new_title = new Title();
        $new_title->emp_no = $employee->emp_no;
        $new_title->title = $request->title;
        $new_title->from_date = date_format(now()), 'Y-m-d');
        $new_title->to_date = '9999-01-01';
        $new_title->save();
        return $new_title;
    }

    /**
     * Display the specified resource.
     * @param \App\Employee $employee
     * @param  \App\Title  $title : numéro de titre de l'employee
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        return $employee->titles()->orderBy('to_date', 'desc')->skip($title - 1)->take(1)->get();
    }


    /**
     * Display the specified resource.
     * @param Employee $employee
     * @return \Title
     */

    public function current(Employee $employee)
    {
        //
        return $employee->title->orderBy('to_date', 'desc')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        //
    }
}
