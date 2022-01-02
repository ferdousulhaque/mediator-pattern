<?php

declare(strict_types=1);

namespace App\Mediator;

enum BabyState
{
    case HUNGRY;
    case PLAYFUL;
    case SLEEPY;
    case POTTY;

    public function state(): string
    {
        return match ($this) {
            BabyState::HUNGRY => 'hungry',
            BabyState::PLAYFUL => 'playful',
            BabyState::SLEEPY => 'sleepy',
            BabyState::POTTY => 'potty',
        };
    }
}
