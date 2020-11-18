<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\FilterRequests\FilterPanelRequest;
use App\Http\Requests\FilterRequests\GetFilterRequest;
use App\Models\Filter;

class FilterController extends ApiController
{

    //public function filteredData(GetFilterRequest $request)
    public function filteredData(GetFilterRequest $request)
    {
        $data = Filter::getFilteredData($request);

        return $this->sendResponse(
            $data,
            'Filtered data received successfully',
            200);
    }

    public function filterPanel(FilterPanelRequest $request)
    {
        $data = Filter::getFilterPanelData($request);

        return $this->sendResponse(
            $data,
            'Filter panel filtered models data received successfully',
            200);
    }

    public function filterPanelInit(){
        $data = Filter::getFilterPanelDataInit();
        return $this->sendResponse(
            $data,
            'Filter panel init data received successfully',
            200);
    }

    public function getModelsByBrand($brand_id){
        $brand_id = str_replace('brands-', '', $brand_id);
        return Filter::getCarmodelsByBrandId($brand_id);
    }
}
