<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiModel extends Model
{
    use HasFactory;

    public static function ObjToArray($obj)
    {
        return json_decode(json_encode($obj), true);
    }


    public function scopeGetallids($query)
    {
        $list = $query->select('id')->get();
        $listArray = self::ObjToArray($list);

        $data = [];

        foreach ($listArray as $key => $item) {
            $data[$key] = $item['id'];
        }
        return $data;
    }


    public function scopeSelected($query, string $fieldName, array $ids)
    {
        $class = get_called_class();
        $id_prefixes = $this->mapIdPrefixes();
        $id_prefix = $id_prefixes[$class];

        //$list = $query->select('id', 'name')->whereIn($fieldName, $ids)->get();
        $list = $query->whereIn($fieldName, $ids)->get();
        $listArray = self::ObjToArray($list);
        foreach ($listArray as $key => $item) {
            $listArray[$key]['id'] = $id_prefix."-".$listArray[$key]['id'];
            $listArray[$key]['value'] = true;
        }
        return $listArray;
    }

    public function scopeList($query)
    {
        $class = get_called_class();
        $id_prefixes = $this->mapIdPrefixes();
        $id_prefix = $id_prefixes[$class];

        //$list = $query->select('id', 'name')->get();
        $list = $query->get();
        $listArray = self::ObjToArray($list);
        foreach ($listArray as $key => $item) {
            $listArray[$key]['id'] = $id_prefix."-".$listArray[$key]['id'];
            $listArray[$key]['value'] = true;
        }
        return $listArray;
    }

    public function mapIdPrefixes()
    {
        return [
            'App\Models\Brand' => 'brands',
            'App\Models\Carmodel' => 'car_models',
            'App\Models\Color' => 'colors',
            'App\Models\Transmission' => 'transmissions',
        ];
    }

    public function getIdPrefixByModel($model)
    {
        switch ($model) {
            case '\App\Models\Brand':
                $result = 'brands';
                break;

            case '\App\Models\Carmodel':
                $result = 'models';
                break;

            case '\App\Models\Color':
                $result = 'colors';
                break;

            case '\App\Models\Transmission':
                $result = 'transmissions';
                break;
        }

        return $result;
    }


}
