<?php

require __DIR__ . '/../vendor/autoload.php';

use \Rx\Observable;
use PrintObserver;

$fruits = ['apple', 'banana', 'orange', 'raspberry'];
$source = Observable::fromArray($fruits);
$source->subscribe(new PrintObserver());