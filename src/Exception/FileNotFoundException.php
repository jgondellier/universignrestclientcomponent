<?php

namespace Universign\Rest\ClientComponent\Exception;

class FileNotFoundException extends \Exception
{

    public function __construct(string $path)
    {
        parent::__construct(sprintf('The file "%s" does not exist', $path));
    }
}
