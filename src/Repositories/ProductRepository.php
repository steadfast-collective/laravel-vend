<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\ApiRequestor;
use SteadfastCollective\LaravelVend\Contracts\ProductRepository as Contract;

class ProductRepository implements Contract
{
    private static $baseUrl = "products/";

    public static function index(array $filters = [])
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }

    public static function show(string $thirdPartyID, array $data = [])
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl.$thirdPartyID, $data);
    }
}
