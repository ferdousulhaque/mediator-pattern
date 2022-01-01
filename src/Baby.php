<?php

declare(strict_types=1);

namespace App\Mediator;

use App\Mediator\Enums\State;
use App\Mediator\Observers\ObserverInterface;
use SplObjectStorage;

class Baby
{
    /**
     * @var State
     */
    private State $current_state;

    /**
     * @var SplObjectStorage
     */
    private SplObjectStorage $observers;

    /**
     * 
     */
    public function __construct()
    {
        $this->observers = new SplObjectStorage;
        return $this;
    }

    /**
     * Set the State
     *
     * @param State $state
     * @return $this
     */
    public function setState(State $state): self
    {
        $this->current_state = $state;
        return $this;
    }

    /**
     * Get the State
     *
     * @return State
     */
    public function getState(): State
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
    public function attachObserver(ObserverInterface $observer)
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
    public function detachObserver(ObserverInterface $observer)
    {
        $this->observers->detach($observer);
        return $this;
    }

    /**
     * Notify All Observers
     *
     * @return void
     */
    public function notifyAll()
    {
        foreach ($this->observers as $observer) {
            $observer->action($this);
        }
    }
}
