<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\PhotoRequests\CreatePhotoRequest;
use App\Http\Requests\PhotoRequests\GetPhotoRequest;
use App\Http\Requests\PhotoRequests\UpdatePhotoRequest;
use App\Models\Photo;


class PhotosController extends ApiController
{

    /**
     * PhotosController constructor.
     * @param Photo $model
     */
    public function __construct(Photo $model)
    {
        $this->model = $model;
    }

    /**
     * @param GetPhotoRequest $request
     * @return mixed
     */
    public function index(GetPhotoRequest $request)
    {
        return $this->get($request);
    }


    /**
     * @param CreatePhotoRequest $request
     * @return mixed
     */
    public function store(CreatePhotoRequest $request)
    {
        $model = new Photo();
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
