<?php

declare(strict_types=1);

namespace App\Mediator\Observers;

use App\Mediator\Baby;
use App\Mediator\Observers\ObserverInterface;
use App\Mediator\State;

class Maid implements ObserverInterface
{
    /**
     *
     * @param Baby $baby
     * @return void
     */
    public function action(Baby $baby): void
    {
        if ($baby->getState() === State::POTTY) {
            echo "Let's clean up" . PHP_EOL;
        }
    }
}
