<?php
namespace Bulutly\Laravel\Enums\Image;

use Bulutly\Laravel\Enums\EnumTrait;

enum Status: int
{
    use EnumTrait;

    case CREATED = 30000;
    case PENDING = 30001;
    case APPROVED = 30002;
    case REJECTED = 30003;
    case PUBLISHED = 30004;
    case UNPUBLISHED = 30005;

 }
