<?php
namespace RxPHP\Two;

require __DIR__ . '/../vendor/autoload.php';

use Rx\Observable;
use Rx\Observer\AbstractObserver;

$first  = Observable::fromArray([2 , 2]);
$second = Observable::fromArray([1, 3, 4]);

$first->concat($second)->subscribe(new PrintObserver());
