<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarmodelRequests\CreateCarmodelRequest;
use App\Http\Requests\CarmodelRequests\GetCarmodelRequest;
use App\Http\Requests\CarmodelRequests\UpdateCarmodelRequest;
use App\Models\Carmodel;
use Illuminate\Http\Request;

class CarmodelsController extends ApiController
{

    /**
     * CarmodelsController constructor.
     * @param Carmodel $model
     */
    public function __construct(Carmodel $model)
    {
        $this->model = $model;
    }

    /**
     * @param GetCarmodelRequest $request
     * @return mixed
     */
    public function index(GetCarmodelRequest $request)
    {
        return $this->get($request);
    }


    /**
     * @param CreateCarmodelRequest $request
     * @return mixed
     */
    public function store(CreateCarmodelRequest $request)
    {
        $model = new Carmodel();
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
     * @param UpdateCarmodelRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateCarmodelRequest $request, $id)
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
