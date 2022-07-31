<?php

namespace Support\Enums;

enum GenderEnum:string
{
    case HETEROSEXUAL = 'Heterosexual';
    case HOMOSEXUAL = 'Homosexual';
    case BISEXUAL = 'Bisexual';
    case LESBIAN = 'Lesbiana';
    case PANSEXUAL = 'Pansexual';
    case OTHER = 'Otro';
    case NOT_SPECIFIC = 'No específico';
}
