<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'email' => 'required|unique:staff_security|email',
            'name' => 'required',
            'age' => 'required|numeric|gt:18',
            'position' => 'required',
            'usage' => 'required',
        ];
    }
}
