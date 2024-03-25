<?php

namespace Universign\Rest\ClientComponent\Exception;

use Symfony\Component\HttpFoundation\Response;

class WrongParametersException extends \Exception
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, Response::HTTP_BAD_REQUEST, $previous);
    }
}
