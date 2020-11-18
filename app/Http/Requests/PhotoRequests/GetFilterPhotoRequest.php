<?php

namespace App\Http\Requests\PhotoRequests;


use App\Http\Requests\ApiRequest;

class GetFilterPhotoRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'integer',
            'car_id' => 'integer',
            'priority' => 'integer',
            'path' => 'string',
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
            'id.integer' => 'The field Id must be of type integer',
            'car_id.integer' => 'The field CarId must be of type integer',
            'priority.integer' => 'The field Priority must be of type integer',
            'path.string' => 'The field Path must be of type string',
        ];
    }

}
