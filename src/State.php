<?php

declare(strict_types=1);

namespace App\Mediator;

enum State
{
    case HUNGRY;
    case PLAYFUL;
    case SLEEPY;
    case POTTY;
}
