<?php

namespace RxPHP\Two;

require_once __DIR__ . "/../../vendor/autoload.php";                                                                                                           

use Rx\Observable;
use RxPHP\Utility\DebugSubject;

$fruits     = ["apple", "banana", "orange", "raspberry"];
$observer   = Observable::fromArray($fruits)->subscribe(new DebugSubject());