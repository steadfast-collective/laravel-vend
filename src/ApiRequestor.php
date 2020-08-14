<?php

namespace SteadfastCollective\LaravelVend;

use Illuminate\Support\Facades\Http;
use SteadfastCollective\LaravelVend\Models\ApiResponse;

class ApiRequestor
{
    protected $client;
    protected $baseUrl;

    public function __construct($host = "vendhq.com", $path = "api/2.0", $protocol = "https", $prefix = null)
    {
        $prefix = $prefix !== null ? $prefix : config('vend.domain_prefix');

        $this->baseUrl = "{$protocol}://{$prefix}.{$host}/{$path}/";
    }

    public function request($method, $endpoint, $data)
    {
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
        };

        $endpoint = $this->baseUrl . $endpoint;

        $headers = [
            'Authorization' => 'Bearer ' . config('vend.personal_token'),
        ];

        return Http::withHeaders($headers)
            ->{$method}($endpoint, $payload)
            ->json();
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
