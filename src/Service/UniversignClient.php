<?php

namespace Universign\Rest\ClientComponent\Service;

use Universign\Rest\ClientComponent\Model\certificatesMatch;
use Universign\Rest\ClientComponent\Service\UniversignClientInterface;

class UniversignClient implements UniversignClientInterface
{
    protected CertificatesMatchClient $certificatesMatchClient;

    public function __construct(string $uri, string $token, LoggerInterface $logger = null)
    {
        $this->uri = $uri;
        $this->token = $token;
        $this->certificatesMatchClient = new CertificatesMatchClient($uri, $logger);
    }

    public function certificatesMatch(certificatesMatch $certificatesMatch){
        return $this->certificatesMatchClient->certificatesMatch($certificatesMatch);
    }
}
