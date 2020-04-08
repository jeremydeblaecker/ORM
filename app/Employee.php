<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    public $guarded=[];

    protected $connection="mysql";

	protected $primaryKey = "emp_no";
	public function salaries(){
    	return $this->hasMany('App\Salarie', 'emp_no');		
    }

    public function titles(){
    	return $this->hasMany('App\Title', 'emp_no');
    }

    public function departments(){
    	return $this->belongsToMany('App\Department', 'dept_emp', 'emp_no', 'dept_no')-> withPivot('from_date', 'to_date');
    }

    public function departments_manager(){
    	return $this->belongsToMany('App\Department', 'dept_manager', 'emp_no', 'dept_no')-> withPivot('from_date', 'to_date');
    }

    public function user(){
        return this->hasOne('App\User', 'id');
    }
    
    @return boolean
   
    public function isManager(){
        
    }
}
