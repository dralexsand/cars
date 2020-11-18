<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransmissionRequests\CreatePhotoRequest;
use App\Http\Requests\TransmissionRequests\GetTransmissionRequest;
use App\Http\Requests\TransmissionRequests\UpdatePhotoRequest;
use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionsController extends ApiController
{

    /**
     * TransmissionsController constructor.
     * @param Transmission $model
     */
    public function __construct(Transmission $model)
    {
        $this->model = $model;
    }

    /**
     * @param GetTransmissionRequest $request
     * @return mixed
     */
    public function index(GetTransmissionRequest $request)
    {
        return $this->get($request);
    }


    /**
     * @param CreatePhotoRequest $request
     * @return mixed
     */
    public function store(CreatePhotoRequest $request)
    {
        $model = new Transmission();
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
     * @param UpdatePhotoRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdatePhotoRequest $request, $id)
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
