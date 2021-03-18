<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingValidation extends FormRequest
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
                'title' => 'required|min:3',
                'description' => 'required|min:5',
                'start_time' => 'required',
                'end_time' => 'nullable',
                'place' => 'required',
            ];

    }
    public function messages()
    {
    return [
        'title.required' => 'Meeting Title required',
        'title.min' => 'Minimum 3 chars length',
        'description.required' => 'Meeting Description required',
        'description.min' => 'Minimum 5 chars length',
        'start_time.required' => 'Please Select Meeting Time',
        'place.required' => 'please Select Place',
    ];
    }
}
