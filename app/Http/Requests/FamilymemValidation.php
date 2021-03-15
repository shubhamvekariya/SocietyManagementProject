<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilymemValidation extends FormRequest
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
            'name' => 'required|max:20',
            'age' => 'required',
            'email' => 'nullable|email',
            'gender' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A Name is required',
            'name.max' => 'maximum 20 chars length',
            'age.required' => 'Age is required',
            'gender.required' => 'please Select Gender',
        ];
    }
}
