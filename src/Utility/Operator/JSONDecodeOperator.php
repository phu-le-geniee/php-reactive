<?php

namespace RxPHP\Utility\Operator;

use Rx\ObservableInterface;
use Rx\ObserverInterface;
use Rx\SchedulerInterface;
use Rx\Operator\OperatorInterface;
use Rx\Observer\CallbackObserver;

class JSONDecodeOperator implements OperatorInterface
{
    public function __invoke(ObservableInterface $observable, ObserverInterface $observer, SchedulerInterface $scheduler = null)
    {
        $obs = new CallbackObserver(
            function ($value) use ($observer) {
                $decoded = json_decode($value, true);
                if (json_last_error() == JSON_ERROR_NONE) {
                    $observer->onNext($decoded);
                } else {
                    $msg = json_last_error_msg();
                    $e = new \InvalidArgumentException($msg);
                    $observer->onError($e);
                }
            },
            function ($error) use ($observer) {
                $observer->onError($error);
            },
            function () use ($observer) {
                $observer->onCompleted();
            }
        );

        return $observable->subscribe($obs, $scheduler);
    }
}
