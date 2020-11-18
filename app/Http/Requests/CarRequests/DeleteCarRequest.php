<?php

namespace App\Http\Requests\CarRequests;


use App\Http\Requests\ApiRequest;

class DeleteCarRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['id' => 'integer',
            'brand_id' => 'integer',
            'model_id' => 'integer',
            'car_created_year' => 'string',
            'car_number' => 'string',
            'color_id' => 'integer',
            'transmission_id' => 'integer',
            'price_per_day' => 'numeric',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return ['id.integer' => 'The field Id must be of type integer',
            'brand_id.integer' => 'The field Brand_id must be of type integer',
            'model_id.integer' => 'The field Model_id must be of type integer',
            'car_created_year.string' => 'The field Car_created_year must be of type string',
            'car_number.string' => 'The field Car_number must be of type string',
            'color_id.integer' => 'The field Color_id must be of type integer',
            'transmission_id.integer' => 'The field Transmission_id must be of type integer',
            'price_per_day.numeric' => 'The field Price_per_day must be of type numeric',
        ];
    }
}
