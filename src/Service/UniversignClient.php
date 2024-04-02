<?php

namespace UniversignRest\ClientComponent\Service;

use Psr\Log\LoggerInterface;
use UniversignRest\ClientComponent\Exception\UniversignException;
use UniversignRest\ClientComponent\Model\certificatesMatch;
use UniversignRest\ClientComponent\Model\IdValidations;
use UniversignRest\ClientComponent\Model\IdValidationsResponse;
use UniversignRest\ClientComponent\Service\CertificatesMatch\CertificatesMatchClient;
use UniversignRest\ClientComponent\Service\IdValidation\IdValidationClient;
use UniversignRest\ClientComponent\Service\UniversignClientInterface;
use UniversignRest\ClientComponent\Model\certificatesMatchResponse;

class UniversignClient implements UniversignClientInterface
{
    protected CertificatesMatchClient $certificatesMatchClient;
    protected IdValidationClient $idValidationsClient;

    public function __construct(string $uri, string $token, LoggerInterface $logger = null)
    {
        $this->certificatesMatchClient = new CertificatesMatchClient($uri, $token, $logger);
        $this->idValidationsClient = new IdValidationClient($uri, $token, $logger);
    }

    /**
     * @throws UniversignException
     */
    public function certificatesMatch(certificatesMatch $certificatesMatch): certificatesMatchResponse
    {
        return $this->certificatesMatchClient->certificatesMatch($certificatesMatch);
    }

    /**
     * @throws UniversignException
     */
    public function idValidation (IdValidations $idValidations):IdValidationsResponse
    {
        return $this->idValidationsClient->idValidation($idValidations);
    }
}
