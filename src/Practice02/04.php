<?php

namespace RxPHP\Two;

require_once __DIR__ . "/../../vendor/autoload.php";

use Rx\Observable;
use RxPHP\Utility\DebugSubject;

$fruits = ['apple', 'banana', 'orange', 'raspberry'];
$subject = new DebugSubject(1);

$subject->map(function ($item) {
    return strlen($item);
})->subscribe(new DebugSubject(2));

$observable = Observable::fromArray($fruits);
$observable->subscribe($subject);
