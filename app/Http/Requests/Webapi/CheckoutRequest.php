<?php

namespace App\Http\Requests\Webapi;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO: check if all recieved app ids belongs to $user's owned promotions
        // POLICY???
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
            'applications' => 'required|numeric_array'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'applications.numeric_array' => 'Applications must be numeric array',
        ];
    }
}
