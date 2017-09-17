<?php

namespace App\Http\Requests\Promotions;

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

    public function all()
    {
        $attributes = parent::all();

        if (!$attributes['address'][0] || !$attributes['lat'][0] 
            || !$attributes['lng'][0]) {
            unset($attributes['address'][0]);
            unset($attributes['lat'][0]);
            unset($attributes['lng'][0]);
        }

        return $attributes;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          // TODO: TURN ON
            // 'image' => 'required|image|max:5400',
            // 'category' => 'required|integer',
            // 'company' => 'required|max:255',
            // 'promotionname' => 'required|max:255',
            // 'promotiondesc' => 'required|max:3000',
            // 'phone' => 'required|max:255',
            // 'website' => ['regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/','nullable','max:255'],
            'address' => 'required|array',
            'lat' => 'required|array',
            'lng' => 'required|array',
            'address.*' => 'required|string|max:255',
            'lat.*' => 'required|numeric',
            'lng.*' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Необходим хотя бы один адрес отмеченный на карте',
            'lat.*.required' => 'Каждый адрес должен быть отмечен на карте',
        ];
    }
}
