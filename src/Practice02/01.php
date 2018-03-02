<?php
namespace RxPHP\Two;

require 'vendor/autoload.php';

use \Rx\Observable;

$fruits = ['apple', 'banana', 'orange', 'raspberry'];
$source = Observable::fromArray($fruits);
$source->subscribe(new PrintObserver());