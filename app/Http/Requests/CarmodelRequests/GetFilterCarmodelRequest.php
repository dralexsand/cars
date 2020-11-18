<?php

namespace App\Http\Requests\CarmodelRequests;


use App\Http\Requests\ApiRequest;

class GetFilterCarmodelRequest extends ApiRequest
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
            'name' => 'string',
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
            'name.string' => 'The field Name must be of type string',
        ];
    }
}
