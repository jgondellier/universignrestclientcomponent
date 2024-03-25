<?php

namespace Universign\Rest\ClientComponent\Client;


use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Universign\Rest\ClientComponent\Exception\UniversignException;
use Universign\Rest\ClientComponent\Logger\DefaultLoggerFactory;

class ApiRestClient
{
    private Client $client;
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->client = new Client([
            'base_uri'  => '',
            'timeout'   => 120,
            'verify'    => false,
        ]);
        $this->logger = $logger ?? DefaultLoggerFactory::getInstance();
    }

    public function get(string $uri, array $params = []): array
    {
        return $this->query(Request::METHOD_GET, $uri, $params);
    }

    public function post(string $uri, array $params = []): array
    {
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