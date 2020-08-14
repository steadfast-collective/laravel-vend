<?php

namespace SteadfastCollective\LaravelVend;

use GuzzleHttp\Client;
use SteadfastCollective\LaravelVend\Models\ApiResponse;

class ApiRequestor
{
     /** @var \GuzzleHttp\Client */
    protected $client;

    /**
     * Create a new Vend Instance.
     */
    public function __construct($host = "api.digitickets.co.uk", $path = null, $protocol = "https")
    {


        $this->client = new Client(["base_uri" => "{$protocol}://{$host}/{$path}/"]);
    }

    public function request($method, $endpoint, $data)
    {
        $data = array_merge(
            [
    			"apiKey" => config("digitickets.key"),
    			"limit" => 10,
                "page" => 1,
            ],
            $data
        );

        switch ($method) {
            case 'GET':
                $payload = [
                    "query" => $data
                ];
                break;

            case 'POST':
                $payload = [
                    "form_params" => $data
                ];
                break;

            case 'DELETE':
                $payload = [
                    "form_params" => $data
                ];
                break;

            case 'PUT':
                $payload = [
                    "form_params" => $data
                ];
                break;

            default:
                $payload = [];
                break;
        }

        $response = $this->client->request($method, $endpoint, $payload);

        return $this->formatResponse($response);
    }

    public function get($endpoint, $data)
    {
        return $this->request("GET", $endpoint, $data);
    }

    public function post($endpoint, $data)
    {
        return $this->request("POST", $endpoint, $data);
    }

    public function delete($endpoint, $data)
    {
        return $this->request("DELETE", $endpoint, $data);
    }

    public function put($endpoint, $data)
    {
        return $this->request("PUT", $endpoint, $data);
    }

    private function formatResponse($response)
    {
        return (new ApiResponse)
            ->setHeaders($response->getHeaders())
            ->setBody(json_decode((string) $response->getBody()));
    }
}
