<?php
namespace Bulutly\Laravel\Enums\Bulut;

use Bulutly\Laravel\Enums\EnumTrait;

enum Provider : int
{

    use EnumTrait;

    case DIGITAL_OCEAN = 7000;
    case VULTR = 7001;
    case LINODE = 7002;
    case AWS = 7003;
    case GOOGLE_CLOUD = 7004;
    case AZURE = 7005;
    case ALIBABA_CLOUD = 7006;

}
