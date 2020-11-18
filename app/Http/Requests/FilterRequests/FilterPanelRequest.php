<?php

namespace App\Http\Requests\FilterRequests;


use App\Http\Requests\ApiRequest;

class FilterPanelRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'brands' => 'array',
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
            //'brands.array' => 'The field Brands must be of type array',
        ];
    }

}
