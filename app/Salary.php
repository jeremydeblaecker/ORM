<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BaseEmployeeModel;

class Salary extends Model
{
	public $timestamps = false;
    protected $primaryKey = "emp_no";

    protected $connection = 'mysql';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'emp_no');
    }
}
