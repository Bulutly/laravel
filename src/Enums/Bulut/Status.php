<?php
namespace Bulutly\Laravel\Enums\Bulut;

use Bulutly\Laravel\Enums\EnumTrait;
enum Status: int
{

    use EnumTrait;

    case CREATED = 14900;
    case WAITING_PAYMENT = 14901;
    case QUEUE = 14902;
    case DEPLOYING = 14903;
    case INSTALLING = 14904;
    case RUNNING = 14905;
    case FINISHED = 14906;
    case CANCELED = 14907;
    case BLOCKED = 14908;

    case FAILED = 14909;

}
