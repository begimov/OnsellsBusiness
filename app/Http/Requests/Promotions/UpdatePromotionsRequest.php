<?php

namespace App\Http\Requests\Promotions;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionsRequest extends FormRequest
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
            'image' => 'image:max:5120',
            'category' => 'required|integer',
            'company' => 'required|max:255',
            'promotionname' => 'required|max:255',
            'promotiondesc' => 'required|max:3000',
            'phone' => 'required|max:255',
            'website' => ['regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/','nullable','max:255'],
        ];
    }
}
