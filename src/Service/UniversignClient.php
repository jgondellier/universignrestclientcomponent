<?php

namespace UniversignRest\ClientComponent\Service;

use Psr\Log\LoggerInterface;
use UniversignRest\ClientComponent\Exception\WrongParametersException;
use UniversignRest\ClientComponent\Model\certificatesMatch;
use UniversignRest\ClientComponent\Service\CertificatesMatch\CertificatesMatchClient;
use UniversignRest\ClientComponent\Service\UniversignClientInterface;
use UniversignRest\ClientComponent\Model\certificatesMatchResponse;

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
