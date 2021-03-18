<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeValidation extends FormRequest
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
                'description' => 'required|string|min:5',
        ];
    }
    public function messages()
    {
    return [
        'title.required' => 'Notic Title required',
        'title.min' => 'Minimum 3 chars length',
        'description.required' => 'Notice Description required',
        'description.min' => 'Minimum 5 chars length',
    ];
}
}
