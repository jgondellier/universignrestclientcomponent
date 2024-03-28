<?php

namespace Universign\Rest\ClientComponent\Service;

use Universign\Rest\ClientComponent\Model\certificatesMatch;

class UniversignClient
{
    protected CertificatesMatchClient $certificatesMatchClient;

    public function __construct(string $uri, LoggerInterface $logger = null)
    {
        $this->uri = $uri;
        $this->certificatesMatchClient = new CertificatesMatchClient($uri, $logger);
    }

    public function certificatesMatch(certificatesMatch $certificatesMatch){
        return $this->certificatesMatchClient->certificatesMatch($certificatesMatch);
    }
}
