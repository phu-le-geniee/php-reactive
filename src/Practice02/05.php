<?php

namespace RxPHP\Two;

require_once __DIR__ . "/../../vendor/autoload.php";

use Rx\Observable;
use RxPHP\Utility\DebugSubject;

$observable = Observable::just('{"value": 42}');
$observable
    ->map(function ($value) {
        return json_decode($value, true);
    })
    ->subscribe(new DebugSubject());

$observable = Observable::just('NA');
$observable
    ->map(function ($value) {
        return json_decode($value, true);
    })
    ->subscribe(new DebugSubject());
    
    
    
