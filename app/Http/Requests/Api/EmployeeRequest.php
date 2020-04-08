<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules=[
                'emp_no'=>'integer',
                'birth_date'=>'date',
                'first_name'=>'string|max:255',
                'last_name'=>'string|max:255',
                'gender'=>'string|in:M,F',
                'hire_date'=>'date|after:birth_date',            
        ];
        if($this->isMethod('POST')){
            foreach($rules as $rule) {
                $rules[$rule] .= '|required';            
            }
            $rules["emp_no"] = 'integer|required|unique:App\Employee';
        }
        return $rules;
    }
}
