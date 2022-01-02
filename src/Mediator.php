<?php

declare(strict_types=1);

namespace App\Mediator;

use App\Mediator\Observers\ObserverInterface;

class Mediator
{
    /**
     * @var []
     */
    private array $callbackMap;

    /*
     *
     * @param BabyState $event
     * @param [type] $callback
     * @return self
     */
    public function addListener(BabyState $event, $callback): self
    {
        $event = $event->state();

        if (!isset($this->callbackMap[$event])) {
            $this->callbackMap[$event] = [];
        }

        $this->callbackMap[$event][] = $callback;
        return $this;
    }

    /**
     * delete listener
     *
     * @param string $event
     * @return self
     */
    public function delListener(BabyState $event): self
    {
        if (isset($this->callbackMap[$event])) {
            unset($this->callbackMap[$event]);
        }

        return $this;
    }

    /**
     *
     * @param BabyState $event
     * @param Baby $baby
     * @return void
     */
    public function dispatch(BabyState $event, Baby $baby)
    {
        $event = $event->state();
        if (isset($this->callbackMap[$event])) {
            foreach ($this->callbackMap[$event] as $callback) {
                call_user_func($callback, $baby);
            }
        }
    }
}
