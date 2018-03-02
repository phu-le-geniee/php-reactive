<?php

namespace RxPHP\Utility;

use Rx\Subject\Subject;

class DebugSubject extends Subject
{
    public function __construct($identifier = null, $maxLen = 64)
    {
        $this->identifier   = $identifier;
        $this->maxLen       = $maxLen;
    }

    public function onCompleted()
    {
        printf("%s%s onCompleted\n", $this->getTime(), $this->id());
        parent::onCompleted();
    }

    public function onNext($val)
    {
        $type = is_object($val) ? get_class($val) : gettype($val);
        if (is_object($val) && method_exists($val, '__toString')) {
            $str = (string) $val;
        } elseif (is_object($val)) {
            $str = get_class($val);
        } elseif (is_array($val)) {
            $str = json_encode($val);
        } else {
            $str = $val;
        }

        if (is_string($val) && strlen($str) > $this->maxLen) {
            $str = substr($str, 0, $this->maxLen) . '...';
        }
        printf("%s%s onNext: %s (%s)\n", $this->getTime(), $this->id(), $str, $type);
        parent::onNext($val);
    }

    public function onError(Exception $err) {
        $msg = $error->getMessage();
        printf("%s%s onError (%s): %s\n", $this->getTime(), $this->id(), get_class($error), $msg);
        parent::onError($err);
    }

    private function getTime()
    {
        return date('H:i:s');
    }

    private function id()
    {
        return ' [' . $this->identifier . ' ]';
    }
}
