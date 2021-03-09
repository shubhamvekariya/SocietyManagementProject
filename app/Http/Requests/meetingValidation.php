<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class meetingValidation extends FormRequest
{
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
                'title' => 'required|max:20',
                'description' => 'required|max:100',
                'start_time' => 'required',
                'end_time' => 'nullable',
                'place' => 'required',
            ];

    }
    public function messages()
    {
    return [
        'title.required' => 'Meeting Title required',
        'title.max' => 'Maximum 20 chars length',
        'description.required' => 'Meeting Description required',
        'description.max' => 'Maximum 100 chars length',
        'start_time.required' => 'Please Select Meeting Time',
        'place.required' => 'please Select Place',
    ];
    }
}
