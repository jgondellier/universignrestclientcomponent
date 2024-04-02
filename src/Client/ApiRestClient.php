<?php

namespace UniversignRest\ClientComponent\Client;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use UniversignRest\ClientComponent\Exception\UniversignException;
use UniversignRest\ClientComponent\Logger\DefaultLoggerFactory;

class ApiRestClient
{
    private Client $client;
    private string $token;
    private LoggerInterface $logger;

    public function __construct(string $uri, string $token, LoggerInterface $logger = null)
    {
        $this->client = new Client([
            'base_uri'  => $uri,
            'timeout'   => 120,
            'verify'    => false,
        ]);
        $this->token = $token;
        $this->logger = $logger ?? DefaultLoggerFactory::getInstance();
    }

    /**
     * @throws UniversignException
     */
    public function get(string $uri, array $params = []): array
    {
        return $this->query(Request::METHOD_GET, $uri, $params);
    }

    /**
     * @throws UniversignException
     */
    public function post(string $uri, array $params = []): array
    {
        $params['headers']['Content-Type'] = 'multipart/form-data';

        return $this->query(Request::METHOD_POST, $uri, $params);
    }

    /**
     * @throws UniversignException
     */
    private function query(string $httpMethod, string $uri, array $params = []): array
    {
        $this->logger->info("UniversignApiRestClient >> Request", [
            'HttpMethod' =>  $httpMethod,
            'Request' => $params

        ]);

        $params['headers']['Authorization'] = 'Bearer '.$this->token;

        try {
            $data = $this->client->request($httpMethod, $uri, $params);
            $response = json_decode($data->getBody()->getContents(), true);
        } catch (\Throwable $e) {
            throw new UniversignException($e->getMessage(), $e->getCode());
        }

        $this->logger->info("UniversignApiRestClient >> Response", [
            'HttpMethod' =>  $httpMethod,
            'Response' => $response
        ]);

        return $response;
    }
}