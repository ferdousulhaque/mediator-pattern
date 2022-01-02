<?php

declare(strict_types=1);

namespace App\Mediator\Observers;

use App\Mediator\Baby;
use App\Mediator\Mediator;
use App\Mediator\BabyState;
use App\Mediator\Observers\ObserverInterface;

class Mom implements ObserverInterface
{

    public function __construct(private Mediator $mediator)
    {
        $this->mediator->addListener(BabyState::HUNGRY, [$this, 'mediatorBasedAction']);
    }

    /**
     *
     * @param Baby $baby
     * @return void
     */
    public function action(Baby $baby): void
    {
        if ($baby->getState() === BabyState::HUNGRY) {
            echo "Let's feed" . PHP_EOL;
        }
    }

    /**
     *
     * @return void
     */
    public function mediatorBasedAction(): void
    {
        echo "Let's feed" . PHP_EOL;
    }
}
