<?php

namespace RxPHP\One;

require_once __DIR__ . "/../../vendor/autoload.php";

use Rx\Observer\CallbackObserver;
use Rx\Observable;


$fruits     = ['apple', 'banana', 'orange', 'raspberry'];
$observer   = new CallbackObserver(function ($value) {
    printf("%s\n", $value);
}, function (Exception $err) {
    $msg = $err->getMessage();
    echo "Error: $msg\n";
}, function () {
    print("Complete\n");
});

Observable::fromArray($fruits)
    ->map(function ($value) {
        return strlen($value);
    })
    ->subscribe($observer);
