<?php

declare(strict_types=1);

namespace App\Mediator\Observers;

use App\Mediator\Enums\State;
use App\Mediator\Baby;

interface ObserverInterface
{
    public function action(Baby $baby): void;
}
