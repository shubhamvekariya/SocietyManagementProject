<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintValidation extends FormRequest
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
            'description' => 'required',
            'category' => 'required',
            'reg_date' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'minimum 3 chars length',
            'description.required' => 'Description is required',
            'category.required' => 'please Select Category',
            'reg_date.required' => 'please Select Date',
        ];
    }
}
