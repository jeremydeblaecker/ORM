<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employee;

class UserFromEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::chunk(100, function($employees){
        	foreach($employees as $employee) {
        	$user = new user();
        	$user->email = $employee->first_name . "." . $employee->last_name . "." . $employee->emp_no . "@employee.edu";
        	$user->emp_no = $employee->emp_no;
        	$user->password = bcrypt('password');
        	$user->api_token = Str::random(80);
        	$user->save();
        }

        });
    }
}
