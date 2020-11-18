<?php


namespace App\Traits;

trait SeederDataTrait
{
    public static function listBrands()
    {
        return [
            'Toyota' => [
                'Crown', 'Camry', 'Corolla', 'Land Cruiser', 'Harrier',
            ],
            'Ford' => [
                'Mustang', 'S-Max', 'Puma', 'Bronco Sport', 'Explorer',
            ],
            'BMW' => [
                'X7 (G07)', '7 Series (G11/G12)', '7 Series (F01/F02)', 'X4 (F26)', '6 Series (F06/F12/F13)',
            ],
            'Porsche' => [
                'Cayenne', 'Macan', 'Taycan', 'Panamera', 'Carrera GT',
            ],
            'Lexus' => [
                'Lexus LY-650 Yacht', ' Lexus LS+', 'Lexus UX', 'Lexus HPX', 'LX 570',
            ],
        ];
    }

    public static function generateCarNumber()
    {
        $car_number = [];

        $car_number[0] = strtoupper(self::generateRandomString(1));
        $car_number[1] = rand(111, 999);
        $car_number[2] = strtoupper(self::generateRandomString(3));

        return implode('', $car_number);
    }

    public static function listColors()
    {
        return [
            'red', 'silver', 'metallic', 'black', 'white', 'orange', 'yellow', 'blue', 'green'
        ];
    }

    public static function listTypeTransmissions()
    {
        return [
            'automatic', 'manual'
        ];
    }

    public static function getRandomValueFromObject($obj)
    {
        $length = sizeof($obj);
        $arr = json_decode(json_encode($obj), true);
        return $arr[rand(0, $length - 1)];
    }

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
