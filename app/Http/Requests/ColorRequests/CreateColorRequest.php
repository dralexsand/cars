<?php

namespace App\Http\Requests\ColorRequests;


use App\Http\Requests\ApiRequest;

class CreateColorRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['id' => 'integer',
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
            'name.string' => 'The field Name must be of type string',
        ];
    }
}
