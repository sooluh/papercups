<?php

namespace Papercups;

use GuzzleHttp\Client;

class BaseClient
{
    /**
     * API Version
     * @var string
     */
    protected static $version = "v1";

    /**
     * @var string
     */
    protected static $token;

    /**
     * @var Client
     */
    private static $client;

    /**
     * Initiate class
     * @param string $token
     * @param string $host
     */
    public function __construct(string $token = null, string $host = 'https://app.papercups.io')
    {
        if (!ob_get_contents() && ob_get_length() <= 0) {
            ob_start();
        }

        $token = self::$token ?: ($token ?: getenv('PAPERCUPS_API_KEY'));
        if (empty($token)) {
            throw new \Exception('API Key must be configured, or set a value in environment variable');
        }
        self::$token = $token;

        $base_uri = [$host, 'api', ''];
        $base_uri = implode('/', $base_uri);

        self::$client = new Client([
            'http_errors' => false,
            'base_uri' => $base_uri
        ]);

        if (method_exists($this, 'setUp')) {
            $this->setUp();
        }
    }

    /**
     * Method to be called before the function runs
     * @return mixed
     */
    protected function setUp()
    {
    }

    /**
     * Method to make a GET requests to Papercups APIs
     * @param string $endpoint
     * @param array $query
     * @return mixed
     */
    protected function get(string $endpoint, array $query = [])
    {
        $endpoint = [
            self::$version,
            $endpoint
        ];
        $endpoint = implode("/", $endpoint);

        $result = self::$client->get($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . self::$token,
                'Accept' => 'application/json'
            ],
            'query' => $query
        ]);

        $json = $result->getBody()->getContents();
        return json_decode($json);
    }

    /**
     * Method to make a POST requests to Papercups APIs
     * @param string $endpoint
     * @param array $query
     * @return mixed
     */
    protected function post(string $endpoint, array $body = [])
    {
        $endpoint = [
            self::$version,
            $endpoint
        ];
        $endpoint = implode("/", $endpoint);

        $result = self::$client->post($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . self::$token,
                'Accept' => 'application/json'
            ],
            'json' => $body
        ]);

        $json = $result->getBody()->getContents();
        return json_decode($json);
    }

    /**
     * Method to make a PUT requests to Papercups APIs
     * @param string $endpoint
     * @param array $body
     * @return mixed
     */
    protected function put(string $endpoint, array $body = [])
    {
        $endpoint = [
            self::$version,
            $endpoint
        ];
        $endpoint = implode("/", $endpoint);

        $result = self::$client->put($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . self::$token,
                'Accept' => 'application/json'
            ],
            'json' => $body
        ]);

        $json = $result->getBody()->getContents();
        return json_decode($json);
    }

    /**
     * Method to make a DELETE requests to Papercups APIs
     * @param string $endpoint
     * @return mixed
     */
    protected function delete(string $endpoint)
    {
        $endpoint = [
            self::$version,
            $endpoint
        ];
        $endpoint = implode("/", $endpoint);

        $result = self::$client->delete($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . self::$token,
                'Accept' => 'application/json'
            ]
        ]);

        $json = $result->getBody()->getContents();
        return json_decode($json);
    }

    /**
     * Method for uploading files to Papercups APIs
     * @param string $endpoint
     * @param array $body
     * @return mixed
     */
    protected function multipart(string $endpoint, array $body = [])
    {
        if (count($body) <= 0) {
            return null;
        }

        $result = self::$client->post($endpoint, [
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . self::$token,
                'Accept' => 'application/json'
            ],
            'multipart' => $body
        ]);

        $json = $result->getBody()->getContents();
        return json_decode($json);
    }
}
