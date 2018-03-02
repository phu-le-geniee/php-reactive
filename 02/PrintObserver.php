<?php

require __DIR__ . '/../vendor/autoload.php';

use \Rx\Observer\AbstractObserver;

class PrintObserver extends AbstractObserver
{
    protected function completed()
    {
        print("Completed\n");
    }

    protected function next($item)
    {
        printf("Next: %s\n", $item);
    }

    protected function error(Exception $err)
    {
        $msg = $err->getMessage();
        printf("Error: %s\n", $msg);
    }
}
