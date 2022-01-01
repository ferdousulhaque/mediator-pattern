<?php

declare(strict_types=1);

namespace App\Mediator\Observers;

use App\Mediator\Baby;
use App\Mediator\Observers\ObserverInterface;
use App\Mediator\State;

class Dad implements ObserverInterface
{
    /**
     *
     * @param Baby $baby
     * @return void
     */
    public function action(Baby $baby): void
    {
        if ($baby->getState() === State::PLAYFUL) {
            echo "Let's play" . PHP_EOL;
        } else if ($baby->getState() === State::SLEEPY) {
            echo "Let's take a nap" . PHP_EOL;
        }
    }
}
