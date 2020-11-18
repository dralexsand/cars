<?php

namespace Database\Seeders;

use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    use SeederDataTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 500; $i++) {

            $transmissions = DB::table('transmissions')->get();
            $colors = DB::table('colors')->get();
            $brands = DB::table('brands')->get();

            $date = date('Y-m-d H:i:s');
            $brand_id = self::getRandomValueFromObject($brands)['id'];
            $model_id = DB::table('brands')->where('id', $brand_id)->get()[0]->id;
            $car_created_year = rand(1990, 2020);
            $car_number = self::generateCarNumber();
            $color_id = self::getRandomValueFromObject($colors)['id'];
            $transmission_id = self::getRandomValueFromObject($transmissions)['id'];
            $price_per_day = round(rand(100, 1000) + rand(100, 1000) / 10000, 2);

            DB::table('cars')->insert([
                'brand_id' => $brand_id,
                'model_id' => $model_id,
                'car_created_year' => $car_created_year,
                'car_number' => $car_number,
                'color_id' => $color_id,
                'transmission_id' => $transmission_id,
                'price_per_day' => $price_per_day,

                'created_at' => $date,
                'updated_at' => $date,
            ]);

        }
    }
}

