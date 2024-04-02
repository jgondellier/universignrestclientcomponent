<?php

namespace UniversignRest\ClientComponent\Service\CertificatesMatch;

use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UniversignRest\ClientComponent\Exception\UniversignException;
use UniversignRest\ClientComponent\Client\ApiRestClient;
use UniversignRest\ClientComponent\Model\certificatesMatch;
use UniversignRest\ClientComponent\Model\certificatesMatchResponse;
use UniversignRest\ClientComponent\Service\UniversignClientInterface;

class CertificatesMatchClient implements CertificatesMatchClientInterface
{
    private ApiRestClient $apiRestClient;

    private Serializer $serializer;

    public function __construct(string $uri, string $token, LoggerInterface $logger = null)
    {
        $this->apiRestClient = new ApiRestClient($uri,$token,$logger);
        $this->serializer = new Serializer([new ObjectNormalizer()]);
    }

    /**
     * @throws UniversignException
     */
    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse
    {
        $data = $this->serializer->normalize($certificatesMatch);

        $result = $this->apiRestClient->get(
            UniversignClientInterface::URI_CERTIFICATE_MATCH,
            ['query' => $data]
        );

        return $this->serializer->denormalize($result,certificatesMatchResponse::class);
    }

}