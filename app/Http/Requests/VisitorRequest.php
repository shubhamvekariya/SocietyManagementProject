<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class VisitorRequest extends FormRequest
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

            case 'staff.visitors.create':
                $rules = [
                    'name' => 'required',
                    'phoneno' => 'required',
                    'member' => 'required',
                    'entryTime' => 'required|date|after:today',
                    'type' => 'required_with:vehicle_no'
                ];
                break;
            case 'staff.visitors.update':
                $rules = [
                    'name' => 'required',
                    'phoneno' => 'required',
                    'member' => 'required',
                    'type' => 'required_with:vehicle_no'
                ];
                break;
            default:
                $rules = [];
        }

        return $rules;
    }
}
