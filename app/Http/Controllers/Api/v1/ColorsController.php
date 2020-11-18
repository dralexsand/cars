<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\ColorRequests\CreateColorRequest;
use App\Http\Requests\ColorRequests\GetColorRequest;
use App\Http\Requests\ColorRequests\UpdateColorRequest;
use App\Models\Color;


class ColorsController extends ApiController
{

    /**
     * ColorsController constructor.
     * @param Color $model
     */
    public function __construct(Color $model)
    {
        $this->model = $model;
    }

    /**
     * @param GetColorRequest $request
     * @return mixed
     */
    public function index(GetColorRequest $request)
    {
        return $this->get($request);
    }


    /**
     * @param CreateColorRequest $request
     * @return mixed
     */
    public function store(CreateColorRequest $request)
    {
        $model = new Color();
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
     * @param UpdateColorRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateColorRequest $request, $id)
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
