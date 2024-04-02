<?php

namespace UniversignRest\ClientComponent\Service\IdValidation;

use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UniversignRest\ClientComponent\Client\ApiRestClient;
use UniversignRest\ClientComponent\Exception\UniversignException;
use UniversignRest\ClientComponent\Model\IdValidations;
use UniversignRest\ClientComponent\Model\IdValidationsResponse;
use UniversignRest\ClientComponent\Service\UniversignClientInterface;

class IdValidationClient
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
    public function idValidation (IdValidations $idValidations):IdValidationsResponse
    {
        $data = $this->serializer->normalize($idValidations);

        $result = $this->apiRestClient->post(
            UniversignClientInterface::URI_ID_PREVALIDATION,
            ['multipart/form-data' => $data]
        );

        return $this->serializer->denormalize($result,IdValidationsResponse::class);
    }
}