<?php

declare(strict_types=1);

use App\Mediator\Baby;
use App\Mediator\Mediator;
use App\Mediator\BabyState;
use App\Mediator\Observers\Dad;
use App\Mediator\Observers\Mom;
use App\Mediator\Observers\Maid;

// Autoload
require_once __DIR__ . '/vendor/autoload.php';

$mediator = new Mediator();

$baby = new Baby($mediator);
$mom = new Mom($mediator);
$dad = new Dad($mediator);
$maid = new Maid($mediator);

// Observer Pattern
$baby->attachObserver($mom)
    ->attachObserver($dad)
    ->attachObserver($maid);

// 
echo 'When Playful -> ' . PHP_EOL;
$baby->setState(BabyState::PLAYFUL);
echo PHP_EOL;
echo 'When Hungry -> ' . PHP_EOL;
$baby->setState(BabyState::HUNGRY);
