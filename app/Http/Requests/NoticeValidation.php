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
                'title' => 'required|max:20',
                'description' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
    return [
        'title.required' => 'Notic Title required',
        'title.max' => 'Maximum 20 chars length',
        'description.required' => 'Notice Description required',
        'description.max' => 'Maximum 100 chars length',
    ];
}
}
