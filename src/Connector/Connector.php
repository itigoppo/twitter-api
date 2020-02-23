<?php

namespace Itigoppo\TwitterApi\Connector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class Connector
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Connector constructor.
     *
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string|null $token
     * @param string|null $tokenSecret
     */
    public function __construct(string $consumerKey, string $consumerSecret, string $token = null, string $tokenSecret = null)
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1(
            [
                'consumer_key' => $consumerKey,
                'consumer_secret' => $consumerSecret,
                'token' => $token,
                'token_secret' => $tokenSecret,
            ]
        );
        $stack->push($middleware);

        $client = new Client(
            [
                'base_uri' => 'https://api.twitter.com/1.1/',
                'handler' => $stack,
                'auth' => 'oauth',
            ]
        );

        $this->client = $client;
    }

    /**
     * @param string $path
     * @param array $formParams
     * @param array $queryParams
     * @param array $headers
     * @return mixed
     * @throws \Exception
     */
    public function get(string $path, array $formParams = [], array $queryParams = [], array $headers = [])
    {
        try {
            $response = $this->client->request(
                'GET',
                $path,
                [
                    'headers' => $this->client->getConfig('headers') + $headers,
                    'query' => $queryParams,
                    'form_params' => $formParams,
                ]
            );
        } catch (ClientException $exception) {
            throw new \Exception($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        if ($response->getStatusCode() != '200') {
            throw new \LogicException('get error', $response->getStatusCode());
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $path
     * @param array $formParams
     * @param array $queryParams
     * @param array $headers
     * @return mixed
     * @throws \Exception
     */
    public function post(string $path, array $formParams = [], array $queryParams = [], array $headers = [])
    {
        try {
            $response = $this->client->request(
                'POST',
                $path,
                [
                    'headers' => $this->client->getConfig('headers') + $headers,
                    'query' => $queryParams,
                    'form_params' => $formParams,
                ]
            );
        } catch (ClientException $exception) {
            throw new \Exception($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        return json_decode($response->getBody()->getContents());
    }
}
