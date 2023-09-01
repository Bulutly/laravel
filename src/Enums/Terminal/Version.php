<?php

namespace Bulutly\Laravel\Enums\Terminal;


use Bulutly\Laravel\Enums\EnumTrait;

enum Version: int
{

    use EnumTrait;

    case MT4 = 0;

    case MT5 = 1;

}
