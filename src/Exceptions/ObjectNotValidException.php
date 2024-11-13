<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ObjectNotValidException extends HttpException
{
    private $objectValidException;
    public function __construct(string $message = "Object not valid", int $statusCode = 400, \Throwable $previous = null)
    {
        $this->objectValidException = sprintf('%s not valid',$message);
        // Pass the HTTP status code, message, and previous exception to the parent constructor
        parent::__construct($statusCode, $this->objectValidException, $previous);
    }

}