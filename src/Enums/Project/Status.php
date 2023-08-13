<?php
namespace Bulutly\Laravel\Enums\Project;

use Bulutly\Laravel\Enums\EnumTrait;

enum Status: int
{
    use EnumTrait;

    case ACTIVE = 9000;
    case ARCHIVED = 9001;
    case SUSPENDED = 9002;
}
