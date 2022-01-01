<?php

declare(strict_types=1);

use App\Mediator\Baby;
use App\Mediator\State;
use App\Mediator\Observers\Dad;
use App\Mediator\Observers\Maid;
use App\Mediator\Observers\Mom;

// Autoload
require_once __DIR__ . '/vendor/autoload.php';

$baby = new Baby();
$baby->attachObserver(new Dad())
    ->attachObserver(new Mom())
    ->attachObserver(new Maid());

echo 'When Playful -> ' . PHP_EOL;
$baby->setState(State::PLAYFUL);
echo PHP_EOL;
echo 'When Hungry -> ' . PHP_EOL;
$baby->setState(State::HUNGRY);
