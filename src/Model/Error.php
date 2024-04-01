<?php

namespace UniversignRest\ClientComponent\Model;

class Error
{
    private string $type;
    private string $error;
    private string $errorDescription;
    private string $param;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    public function getErrorDescription(): string
    {
        return $this->errorDescription;
    }

    public function setErrorDescription(string $errorDescription): void
    {
        $this->errorDescription = $errorDescription;
    }

    public function getParam(): string
    {
        return $this->param;
    }

    public function setParam(string $param): void
    {
        $this->param = $param;
    }

}