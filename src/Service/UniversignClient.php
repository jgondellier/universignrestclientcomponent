<?php

namespace Universign\Rest\ClientComponent\Service;

use Psr\Log\LoggerInterface;
use Universign\Rest\ClientComponent\Exception\WrongParametersException;
use Universign\Rest\ClientComponent\Model\certificatesMatch;
use Universign\Rest\ClientComponent\Service\CertificatesMatch\CertificatesMatchClient;
use Universign\Rest\ClientComponent\Service\UniversignClientInterface;
use Universign\Rest\ClientComponent\Model\certificatesMatchResponse;

class UniversignClient implements UniversignClientInterface
{
    protected CertificatesMatchClient $certificatesMatchClient;
    private string $token;
    private string $uri;

    public function __construct(string $uri, string $token, LoggerInterface $logger = null)
    {
        $this->uri = $uri;
        $this->token = $token;
        $this->certificatesMatchClient = new CertificatesMatchClient($uri, $logger);
    }

    /**
     * @throws WrongParametersException
     */
    public function certificatesMatch(certificatesMatch $certificatesMatch): certificatesMatchResponse
    {
        return $this->certificatesMatchClient->certificatesMatch($certificatesMatch);
    }
}
