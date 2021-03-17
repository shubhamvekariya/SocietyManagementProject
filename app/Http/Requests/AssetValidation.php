<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $stopOnFirstFailure = true;
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
            'name' => 'required|min:3',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'assets' => 'required',
            'func_details' => 'nullable',
        ];

    }
    public function messages()
    {
    return [
        'name.required' => 'Name required',
        'name.min' => 'Minimum 3 chars length',
        'start_time.required' => 'Please Select Asset Date Time',
        'assets.required' => 'please Select Asset or Event',
    ];
    }
}
