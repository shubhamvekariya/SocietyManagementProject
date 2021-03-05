<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AuthRequest extends FormRequest
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

            case 'login.society':
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required',
                ];
                break;
            case 'login.member':
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required',
                ];
                break;
            case 'login.staff':
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required',
                ];
                break;
            case 'register.society':
                $rules = [
                    'society_name' => 'required',
                    'country' => 'required',
                    'email' => 'required|unique:societies|email',
                    'password' => 'required_with:password_confirmation|confirmed|min:8|max:16',
                    'phoneno' => 'required',
                ];
                break;
            case 'register.member':
                $rules = [
                    'name' => 'required',
                    'email' => 'required|unique:users|email',
                    'password' => 'required_with:password_confirmation|confirmed|min:8|max:16',
                    'phoneno' => 'required',
                    'age' => 'required|numeric|gt:18',
                    'name_or_number' => 'required',
                    'society_id' => 'required',
                ];
                break;
            default:
                $rules = [];
        }

        return $rules;
    }
}
