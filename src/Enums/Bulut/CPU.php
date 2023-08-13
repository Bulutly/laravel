<?php
namespace App\Enums\Bulut;

use App\Enums\EnumTrait;

enum CPU: int
{
    use EnumTrait;

    case m100 = 100;
    case m200 = 200;
    case m300 = 300;
    case m400 = 400;
    case m500 = 500;
    case m600 = 600;
    case m700 = 700;
    case m800 = 800;
    case m900 = 900;
    case V_1 = 1000;
    case V_2 = 2000;
    case V_3 = 3000;
    case V_4 = 4000;
    case V_6 = 6000;
    case V_8 = 8000;
    case V_10 = 10000;
    case V_12 = 12000;
    case V_14 = 14000;
    case V_16 = 16000;
    case V_18 = 18000;
    case V_20 = 20000;
    case V_22 = 22000;
    case V_24 = 24000;
    case V_26 = 26000;

    public static function getPrices($key){
        return self::toSelectArrayWithKeys()[$key]/100*0.2;
    }

    public static function getLabel(string $key): string
    {
        $string = strtoupper(str_replace('_', ' ', $key));
        $string .= ' / $'.number_format(self::getPrices($key), 2).' / Month';
        return $string;
    }

}
