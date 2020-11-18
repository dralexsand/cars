<?php

namespace Database\Seeders;

use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarmodelSeeder extends Seeder
{

    use SeederDataTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = self::listBrands();

        $brands = DB::table('brands')->get();

        foreach ($brands as $brand) {

            foreach ($list as $brandName => $modeNames) {

                if ($brand->name == $brandName) {

                    foreach ($modeNames as $modeName) {
                        $date = date('Y-m-d H:i:s');

                        DB::table('carmodels')->insert([
                            'brand_id' => $brand->id,
                            'name' => $modeName,
                            'created_at' => $date,
                            'updated_at' => $date,
                        ]);
                    }
                }

            }
        }

    }
}
