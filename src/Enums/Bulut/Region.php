<?php
namespace Bulutly\Laravel\Enums\Bulut;

use Bulutly\Laravel\Enums\EnumTrait;
enum Region: int
{
    use EnumTrait;

    case NEW_YORK = 85000;
    case AMSTERDAM = 85001;
    case FRANKFURT = 85002;
    case LONDON = 85003;
    case SAN_FRANCISCO = 85004;
    case SINGAPORE = 85005;
    case TORONTO = 85006;
    case BANGKOK = 85007;
    case HONG_KONG = 85008;
    case PARIS = 85009;
    case SYDNEY = 85010;
    case TOKYO = 85011;
    case MUMBAI = 85012;
}
