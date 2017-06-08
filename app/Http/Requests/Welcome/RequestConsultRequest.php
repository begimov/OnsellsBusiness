<?php

namespace App\Http\Requests\Welcome;

use Illuminate\Foundation\Http\FormRequest;

class RequestConsultRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'company' => 'required|max:255',
            'url' => 'nullable',
        ];
    }
}
