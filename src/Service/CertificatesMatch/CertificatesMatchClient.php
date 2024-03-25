<?php

namespace Universign\Rest\ClientComponent\Service\CertificatesMatch;

use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Universign\Rest\ClientComponent\Exception\WrongParametersException;
use Universign\Rest\ClientComponent\Logger\DefaultLoggerFactory;
use Universign\Rest\ClientComponent\Client\ApiRestClient;
use Universign\Rest\ClientComponent\Model\certificatesMatch;
use Universign\Rest\ClientComponent\Model\certificatesMatchResponse;
use Universign\Rest\ClientComponent\Service\UniversignClient;
use Universign\Rest\ClientComponent\Service\UniversignClientInterface;

class CertificatesMatchClient
{
    private ApiRestClient $apiRestClient;

    private LoggerInterface $logger;

    private string $uri;

    private Serializer $serializer;

    public function __construct(string $uri, LoggerInterface $logger = null)
    {
        $this->apiRestClient = new ApiRestClient($logger);
        $this->serializer = new Serializer([new ObjectNormalizer()]);
        $this->logger = $logger ?? DefaultLoggerFactory::getInstance();
        $this->uri    = $uri;
    }

    /**
     * @throws WrongParametersException
     */
    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse
    {
        $data = $this->serializer->normalize($certificatesMatch);

        $result = $this->apiRestClient->get(
            $this->uri.UniversignClientInterface::VERSION.UniversignClientInterface::URI_CERTIFICATE_MATCH,
            $data
        );

        if (isset($result['faultCode'])) {
            throw new WrongParametersException($result['faultString']);
        }

        return $this->serializer->normalize($result);
    }
}