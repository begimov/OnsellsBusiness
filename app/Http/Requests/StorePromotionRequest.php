<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
            // 'category' => 'required',
            'company' => 'required|max:255',
            'promotion-name' => 'required|max:255',
            'promotion-desc' => 'required|max:3000',
            'phone' => 'required|max:255',
            'website' => ['regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/','nullable','max:255'],
            'address' => 'required|max:255',
        ];
    }
}
