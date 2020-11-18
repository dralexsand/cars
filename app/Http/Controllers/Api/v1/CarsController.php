<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequests\CreateCarRequest;
use App\Http\Requests\CarRequests\GetCarRequest;
use App\Http\Requests\CarRequests\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends ApiController
{

    /**
     * CarController constructor.
     * @param Car $model
     */
    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    /**
     * @param GetCarRequest $request
     * @return mixed
     */
    public function index(GetCarRequest $request)
    {
        return $this->get($request);
    }


    /**
     * @param CreateCarRequest $request
     * @return mixed
     */
    public function store(CreateCarRequest $request)
    {
        $model = new Car();
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
     * @param UpdateCarRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateCarRequest $request, $id)
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
