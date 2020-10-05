<?php

namespace SteadfastCollective\LaravelVend;

use Illuminate\Support\Facades\Http;
use SteadfastCollective\LaravelVend\Exceptions\VendRateLimitedException;

class ApiRequestor
{
    private $client;
    private $baseUrl;

    public function __construct($host = "vendhq.com", $path = "api/2.0", $protocol = "https", $prefix = null)
    {
        $prefix = $prefix !== null ? $prefix : config('vend.domain_prefix');

        $this->baseUrl = "{$protocol}://{$prefix}.{$host}/{$path}/";
    }

    public function request($method, $endpoint, $data)
    {
        $endpoint = $this->baseUrl . $endpoint;

        $headers = [
            'Authorization' => 'Bearer ' . config('vend.personal_token'),
        ];

        $data = array_merge([
            'page_size' => config('vend.page_size', 75),
        ], $data);


        $response = Http::withHeaders($headers)
            ->{$method}($endpoint, $data);

        switch ($response->status()) {
            case '200':
                return $response->json();

            case '429':
                throw new VendRateLimitedException($response->json()['error']);
        }
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
}
