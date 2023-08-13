<?php
namespace Bulutly\Laravel\Enums\Bulut;

use Bulutly\Laravel\Enums\EnumTrait;


enum Memory: int
{
    use EnumTrait;

    case MB_512 = 512;
    case MB_1024 = 1024;
    case MB_1536 = 1536;
    case MB_2048 = 2048;
    case MB_2560 = 2560;
    case MB_3072 = 3072;
    case MB_3584 = 3584;
    case MB_4096 = 4096;
    case MB_4608 = 4608;
    case MB_5120 = 5120;
    case MB_5632 = 5632;
    case MB_6144 = 6144;
    case MB_6656 = 6656;
    case MB_7168 = 7168;
    case MB_7680 = 7680;
    case MB_8192 = 8192;
    case MB_8704 = 8704;
    case MB_9216 = 9216;
    case MB_9728 = 9728;
    case MB_10240 = 10240;
    case MB_10752 = 10752;
    case MB_11264 = 11264;
    case MB_11776 = 11776;
    case MB_12288 = 12288;
    case MB_12800 = 12800;
    case MB_13312 = 13312;
    case MB_13824 = 13824;
    case MB_14336 = 14336;
    case MB_14848 = 14848;
    case MB_15360 = 15360;
    case MB_15872 = 15872;
    case MB_16384 = 16384;

    public static function getPrices()
    {
        $prices = [];
        foreach (self::cases() as $key => $value) {
            switch ($value) {
                case self::MB_512:
                    $prices[$value->name] = 3.2;
                    break;
                case self::MB_1024:
                    $prices[$value->name] = 6.4;
                    break;
                case self::MB_1536:
                    $prices[$value->name] = 9.6;
                    break;
                case self::MB_2048:
                    $prices[$value->name] = 12.8;
                    break;
                case self::MB_2560:
                    $prices[$value->name] = 16;
                    break;
                case self::MB_3072:
                    $prices[$value->name] = 19.2;
                    break;
                case self::MB_3584:
                    $prices[$value->name] = 22.4;
                    break;
                case self::MB_4096:
                    $prices[$value->name] = 25.6;
                    break;
                case self::MB_4608:
                    $prices[$value->name] = 28.8;
                    break;
                case self::MB_5120:
                    $prices[$value->name] = 32;
                    break;
                case self::MB_5632:
                    $prices[$value->name] = 35.2;
                    break;
                case self::MB_6144:
                    $prices[$value->name] = 38.4;
                    break;
                case self::MB_6656:
                    $prices[$value->name] = 41.6;
                    break;
                case self::MB_7168:
                    $prices[$value->name] = 44.8;
                    break;
                case self::MB_7680:
                    $prices[$value->name] = 48;
                    break;
                case self::MB_8192:
                    $prices[$value->name] = 51.2;
                    break;
                case self::MB_8704:
                    $prices[$value->name] = 54.4;
                    break;
                case self::MB_9216:
                    $prices[$value->name] = 57.6;
                    break;
                case self::MB_9728:
                    $prices[$value->name] = 60.8;
                    break;
                case self::MB_10240:
                    $prices[$value->name] = 64;
                    break;
                case self::MB_10752:
                    $prices[$value->name] = 67.2;
                    break;
                case self::MB_11264:
                    $prices[$value->name] = 70.4;
                    break;
                case self::MB_11776:
                    $prices[$value->name] = 73.6;
                    break;
                case self::MB_12288:
                    $prices[$value->name] = 76.8;
                    break;
                case self::MB_12800:
                    $prices[$value->name] = 80;
                    break;
                case self::MB_13312:
                    $prices[$value->name] = 83.2;
                    break;
                case self::MB_13824:
                    $prices[$value->name] = 86.4;
                    break;
                case self::MB_14336:
                    $prices[$value->name] = 89.6;
                    break;
                case self::MB_14848:
                    $prices[$value->name] = 92.8;
                    break;
                case self::MB_15360:
                    $prices[$value->name] = 96;
                    break;
                case self::MB_15872:
                    $prices[$value->name] = 99.2;
                    break;
                case self::MB_16384:
                    $prices[$value->name] = 102.4;
                    break;
            }
        }
        return $prices;
    }

    public static function getLabel(string $key): string
    {
        $string = strtoupper(str_replace('_', ' ', $key));
        $string .= ' / $'.number_format(self::getPrices()[$key], 2).' / Month';
        return $string;
    }
}
