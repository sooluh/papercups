<?php

namespace Papercups;

use GuzzleHttp\Client;

class BaseClient
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var Client
     */
    private $client;

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

        $token = $token ?: getenv('PAPERCUPS_API_KEY');
        if (empty($token)) {
            throw new \Exception('API Key must be configured, or set a value in environment variable');
        }
        $this->token = $token;

        $base_uri = [$host, 'api', 'v1', ''];
        $base_uri = implode('/', $base_uri);

        $this->client = new Client([
            'http_errors' => false,
            'base_uri' => $base_uri
        ]);

        if (method_exists($this, 'setUp')) {
            $this->setUp();
        }
    }

    /**
     * Method to be called before the function runs
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
        $result = $this->client->get($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
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
        $result = $this->client->post($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
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
        $result = $this->client->put($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
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
        $result = $this->client->delete($endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json'
            ]
        ]);

        $json = $result->getBody()->getContents();
        return json_decode($json);
    }
}
