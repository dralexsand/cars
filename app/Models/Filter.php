<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Filter extends ApiModel
{
    use HasFactory;


    public static function preProcessRequestFilteredData($request)
    {
        $data = [];

        $filters = self::ObjToArray($request);

        foreach ($filters as $key => $filterData) {
            if ($key !== 'prices' && $key !== 'years') {

                foreach ($filterData as $item) {
                    if ($item['value'] === true) {
                        $id_arr = explode('-', $item['id']);
                        $data[$key][] = (int)$id_arr[1];
                    }
                }
            }
        }

        $data['prices'] = [
            $filters['prices']['min_price'],
            $filters['prices']['max_price'],
        ];

        $data['years'] = [
            $filters['years']['min_year'],
            $filters['years']['max_year'],
        ];

        return $data;
    }

    public static function getFilteredData($request)
    {
        //$filters = self::ObjToArray($request->all());
        //$models = \App\Models\Carmodel::list($car_models)->get();

        $param_data = $request->param_data;

        if (empty($filters)) {
            $brands = Brand::getallids();
            $car_models = Carmodel::getallids();
            $transmissions = Transmission::getallids();
            $colors = Color::getallids();

            $prices = array_values(self::getDefaultPrices());
            $years = array_values(self::getDefaultYears());

        } else {

            $filters = self::preProcessRequestFilteredData($param_data);

            $brands = $filters['brands'];
            $car_models = $filters['car_models'];
            $transmissions = $filters['transmissions'];
            $colors = $filters['colors'];

            $prices = !isset($filters['prices']) ? self::getDefaultPrices() : $filters['prices'];
            $years = !isset($filters['years']) ? self::getDefaultYears() : $filters['years'];
        }


        $data = DB::table('cars')
            ->join(
                'brands',
                'brands.id',
                '=',
                'cars.brand_id')
            ->leftJoin(
                'car_models',
                'car_models.brand_id',
                '=',
                'brands.id')
            ->join(
                'colors',
                'colors.id',
                '=',
                'cars.color_id')
            ->join(
                'transmissions',
                'transmissions.id',
                '=',
                'cars.transmission_id')
            //
            ->whereIn('brands.id', $brands)
            ->whereIn('car_models.id', $car_models)
            ->whereIn('colors.id', $colors)
            ->whereIn('transmissions.id', $transmissions)
            //
            ->where('cars.car_created_year', '>=', $years[0])
            ->where('cars.car_created_year', '<=', $years[1])
            //
            ->where('cars.price_per_day', '>=', $prices[0])
            ->where('cars.price_per_day', '<=', $prices[1])
            //
            ->select(
                'brands.name as brand_name',
                'car_models.name as car_model_name',
                'transmissions.name as transmission_name',
                'colors.name as color_name',

                'cars.price_per_day',
                'cars.car_created_year',
                'cars.car_number',
                'cars.photo'
            )
            ->paginate(20);

        return $data;
    }

    public static function getFilterPanelData0()
    {
        //$models = \App\Models\Carmodel::list($car_models)->get();

        /*if (!empty($request)) {
            $brands = self::ObjToArray($request->all()['brands']);
            $brands_names = \App\Models\Brand::select('id', 'name')->whereIn('id', $brands)->get();
            $car_models = \App\Models\Carmodel::select('id', 'name')->whereIn('brand_id', $brands)->get();
            $car_models = self::ObjToArray($car_models);
        } else {
            $brands = \App\Models\Brand::list();
            $car_models = [];
        }*/

        $data = [
            //'brands' => self::ObjToArray($brands_names),
            'brands' => \App\Models\Brand::list(),
            'car_models' => \App\Models\Carmodel::list(),
            //'car_models' => $car_models,
            'colors' => \App\Models\Color::list(),
            'transmissions' => \App\Models\Transmission::list(),
        ];

        return $data;

    }


    public static function getCarmodelsByBrandId0($brand_id)
    {
        $models_obj = Carmodel::where('brand_id', '=', $brand_id)->get();
        $model_array = self::ObjToArray($models_obj);

        $ids = [];
        foreach ($model_array as $item) {
            $ids[] = 'brands-' . $item['id'];
        }
        return $ids;
    }

    public static function getCarmodelsByBrandId($brand_id)
    {
        //$models_obj = Carmodel::where('brand_id', '=', $brand_id)->get();
        $models_obj = Carmodel::all();
        $model_array = self::ObjToArray($models_obj);

        $ids = [];
        $all = [];
        foreach ($model_array as $item) {
            $id = 'brands-' . $item['id'];
            $item['id'] = $id;
            $all[] = $item;

            if ($item['brand_id'] == $brand_id) {
                $ids[] = $id;
            }
        }
        return [
            'all' => $all,
            'unchecked_ids' => $ids
        ];
    }


    public static function getFilterPanelData($request)
    {
        $brands_data = self::ObjToArray($request->all());
        //$brands_data_filter = $brands_data['brands'];
        $brands_ids = $brands_data['brands'];

        if (!empty($brands_ids)) {
            /*$car_models_ids = Carmodel::query()
                ->select('id')
                ->whereIn('brand_id', $brands_ids)
                ->get();*/

            $car_models = Carmodel::selected('brand_id', $brands_ids);
        } else {
            $brands = \App\Models\Brand::list();
            $car_models = [];
        }

        $data = [
            //'brands' => self::ObjToArray($brands_names),
            'brands' => \App\Models\Brand::list(),
            'car_models' => $car_models,
            //'car_models' => $car_models,
            'colors' => \App\Models\Color::list(),
            'transmissions' => \App\Models\Transmission::list(),
        ];

        return $data;

    }

    public static function getDefaultPrices()
    {
        return [
            'min_price' => 70,
            'max_price' => 10000
        ];
    }

    public static function getDefaultYears()
    {
        return [
            'min_year' => '1990',
            'max_year' => date('Y')
        ];
    }

    public static function getFilterPanelDataInit()
    {
        $init_prices = self::getDefaultPrices();
        $init_years = self::getDefaultYears();

        $data = [
            'brands' => \App\Models\Brand::list(),
            'car_models' => \App\Models\Carmodel::list(),
            'colors' => \App\Models\Color::list(),
            'transmissions' => \App\Models\Transmission::list(),
            'prices' => $init_prices,
            'years' => $init_years,
        ];

        return $data;
    }
}
