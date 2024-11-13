<?php

namespace App\Exceptions;

use Exception;

class ObjectNotFoundException extends Exception
{
    private $objectMessageData;

    public function __construct(string $message, int $code = 0, Exception $previous = null)
    {

        $this->objectMessageData = sprintf('%s not found', $message);

        parent::__construct($this->objectMessageData, $code, $previous);
    }
}