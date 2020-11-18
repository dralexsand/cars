<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\BrandRequests\CreateBrandRequest;
use App\Http\Requests\BrandRequests\GetBrandRequest;
use App\Http\Requests\BrandRequests\UpdateBrandRequest;
use App\Models\Brand;

class BrandsController extends ApiController
{


    /**
     * BrandsController constructor.
     * @param Brand $model
     */
    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    /**
     * @param GetBrandRequest $request
     * @return mixed
     */
    public function index(GetBrandRequest $request)
    {
        return $this->get($request);
    }


    /**
     * @param CreateBrandRequest $request
     * @return mixed
     */
    public function store(CreateBrandRequest $request)
    {
        $model = new Brand();
        $model = $this->fillModelData($model, $request);
        $model->save();

        return $this->sendResponse(
            $model,
            'Data successfully validated and has been saved',
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->detail($id);
    }


    /**
     * @param UpdateBrandRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $model = $this->model->find($id);

        if (!$model) {
            return $this->sendError('Data not found', 404);
        }

        $data = $this->fillModelData($this->model, $request);
        $model->update($data);

        return $this->sendResponse(
            $data,
            'Data successfully validated and updated',
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return parent::delete($id);
    }

}
