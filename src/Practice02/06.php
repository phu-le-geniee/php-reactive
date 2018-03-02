<?php

namespace RxPHP\Two;

require_once __DIR__ . "/../../vendor/autoload.php";

use Rx\Observable;
use RxPHP\Utility\Operator\JSONDecodeOperator;
use RxPHP\Utility\DebugSubject;

// $observable = Observable::just('{"value": 42}')
$observable = Observable::just('NA')
    ->lift(function () {
        return new JSONDecodeOperator();
    })
    ->subscribe(new DebugSubject());
