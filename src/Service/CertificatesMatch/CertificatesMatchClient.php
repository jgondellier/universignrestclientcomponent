<?php

namespace UniversignRest\ClientComponent\Service\CertificatesMatch;

use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UniversignRest\ClientComponent\Exception\UniversignException;
use UniversignRest\ClientComponent\Exception\WrongParametersException;
use UniversignRest\ClientComponent\Logger\DefaultLoggerFactory;
use UniversignRest\ClientComponent\Client\ApiRestClient;
use UniversignRest\ClientComponent\Model\certificatesMatch;
use UniversignRest\ClientComponent\Model\certificatesMatchResponse;
use UniversignRest\ClientComponent\Service\UniversignClient;
use UniversignRest\ClientComponent\Service\UniversignClientInterface;

class CertificatesMatchClient implements CertificatesMatchClientInterface
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
     * @throws WrongParametersException|UniversignException
     */
    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse
    {
        $data = $this->serializer->normalize($certificatesMatch);

        $result = $this->apiRestClient->get(
            $this->uri.'/'.UniversignClientInterface::VERSION.UniversignClientInterface::URI_CERTIFICATE_MATCH,
            $data
        );

        if (isset($result['faultCode'])) {
            throw new WrongParametersException($result['faultString']);
        }

        return $this->serializer->normalize($result);
    }
}