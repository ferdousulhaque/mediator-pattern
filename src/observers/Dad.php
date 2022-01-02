<?php

declare(strict_types=1);

namespace App\Mediator\Observers;

use App\Mediator\Baby;
use App\Mediator\Observers\ObserverInterface;
use App\Mediator\BabyState;
use App\Mediator\Mediator;

class Dad implements ObserverInterface
{

    public function __construct(private Mediator $mediator)
    {
        $this->mediator->addListener(BabyState::PLAYFUL, [$this, 'mediatorBasedActionPlay']);
        $this->mediator->addListener(BabyState::SLEEPY, [$this, 'mediatorBasedActionSleep']);
    }

    /**
     *
     * @param Baby $baby
     * @return void
     */
    public function action(Baby $baby): void
    {
        if ($baby->getState() === BabyState::PLAYFUL) {
            echo "Let's play" . PHP_EOL;
        } else if ($baby->getState() === BabyState::SLEEPY) {
            echo "Let's take a nap" . PHP_EOL;
        }
    }

    /**
     *
     * @return void
     */
    public function mediatorBasedActionPlay(): void
    {
        echo "Let's play" . PHP_EOL;
    }

    /**
     *
     * @return void
     */
    public function mediatorBasedActionSleep(): void
    {
        echo "Let's take a nap" . PHP_EOL;
    }
}
