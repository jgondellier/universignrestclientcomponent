<?php

namespace UniversignRest\ClientComponent\Model;

class CertificatesMatchResponse
{
    private bool $matchFound;

    public function isMatchFound(): bool
    {
        return $this->matchFound;
    }

    public function setMatchFound(bool $matchFound): void
    {
        $this->matchFound = $matchFound;
    }
}