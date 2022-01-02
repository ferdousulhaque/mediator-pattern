<?php

declare(strict_types=1);

namespace App\Mediator;

use App\Mediator\BabyState;
use App\Mediator\Observers\ObserverInterface;
use SplObjectStorage;

class Baby
{
    /**
     * @var BabyState
     */
    private BabyState $current_state;

    /**
     * @var SplObjectStorage
     */
    private SplObjectStorage $observers;

    /**
     * 
     */
    public function __construct(private Mediator $mediator)
    {
        $this->observers = new SplObjectStorage;
        return $this;
    }

    /**
     * Set the State
     *
     * @param BabyState $state
     * @return void
     */
    public function setState(BabyState $state): void
    {
        $this->current_state = $state;

        // Observer Pattern
        // $this->notifyAll();

        // Mediator Pattern
        $this->sendToMediatorForAction();
    }

    /**
     * Get the State
     *
     * @return BabyState
     */
    public function getState(): BabyState
    {
        return $this->current_state;
    }

    /**
     * Add observers
     * Mutator Method
     *
     * @param ObserverInterface $observer
     * @return $this
     */
    public function attachObserver(ObserverInterface $observer): self
    {
        // $this->observers->init
        $this->observers->attach($observer);
        return $this;
    }

    /**
     * Remove observers
     * Mutator Method
     *
     * @param ObserverInterface $observer
     * @return $this
     */
    public function detachObserver(ObserverInterface $observer): self
    {
        $this->observers->detach($observer);
        return $this;
    }

    /**
     * Notify All Observers
     *
     * @return void
     */
    public function notifyAll(): void
    {
        foreach ($this->observers as $observer) {
            $observer->action($this);
        }
    }

    /**
     * Mediator to Dispatch the Action
     *
     * @return void
     */
    public function sendToMediatorForAction(): void
    {
        $this->mediator->dispatch($this->getState(), $this);
    }
}
