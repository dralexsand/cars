<?php

namespace App\Http\Requests\FilterRequests;


use App\Http\Requests\ApiRequest;

class GetFilterRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /*'brands' => 'required|array',
            'car_models' => 'required|array',
            'transmissions' => 'required|array',
            'colors' => 'required|array',
            'prices' => 'required|array',
            'years' => 'required|array',*/
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            /*'brands.required' => 'The field Brands is required',
            'brands.array' => 'The field Brands must be of type array',

            'car_models.required' => 'The field CarModels is required',
            'car_models.array' => 'The field CarModels must be of type array',

            'transmissions.required' => 'The field Transmissions is required',
            'transmissions.array' => 'The field Transmissions must be of type array',

            'colors.required' => 'The field Colors is required',
            'colors.array' => 'The field Colors must be of type array',

            'prices.required' => 'The field Prices is required',
            'prices.array' => 'The field Prices must be of type array',

            'years.required' => 'The field Years is required',
            'years.array' => 'The field Years must be of type array',*/

        ];
    }

}
