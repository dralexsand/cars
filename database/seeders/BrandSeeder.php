<?php

namespace Database\Seeders;

use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    use SeederDataTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $list = array_keys(self::listBrands());
        $date = date('Y-m-d H:i:s');

        foreach ($list as $item) {
            DB::table('brands')->insert([
                'name' => $item,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
