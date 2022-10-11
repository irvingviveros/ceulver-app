<?php

// See more info at https://enversanli.medium.com/how-to-use-enums-with-laravel-9-d18f1ee35b56
// https://youtu.be/uEBHJVK-Ibg
namespace Support\Enums;

enum MaritalStatusEnum:string
{
    case MARRIED = 'Casado';
    case SINGLE = 'Soltero';
    case DIVORCED = 'Divorciado';
    case WIDOWED = 'Viudo';
    case NOT_SPECIFIC = 'No aplica';
}
