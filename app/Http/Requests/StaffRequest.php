<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

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
        switch (Route::currentRouteName()) {

            case 'member.staffs.store':
                $rules = [
                    'email' => 'required|unique:staff_security|email',
                    'name' => 'required',
                    'age' => 'required|numeric|gt:18',
                    'salary' => 'required',
                    'nonworkingday' => 'required',
                    'position' => 'required',
                    'usage' => 'required',
                ];
                break;
            case 'member.staffs.update':
                $rules = [
                    'email' => 'required|email',
                    'name' => 'required',
                    'age' => 'required|numeric|gt:18',
                    'salary' => 'required',
                    'nonworkingday' => 'required',
                    'position' => 'required',
                    'usage' => 'required',
                ];
                break;
            case 'staff.setpassword':
                $rules = [
                    'password' => 'required_with:password_confirmation|confirmed|min:8|max:16',
                ];
                break;
            default:
                $rules = [];
        }

        return $rules;
        //

    }
}
