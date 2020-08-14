<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\ApiRequestor;

class ProductRepository
{
    private static $baseUrl = "products/";

    public static function index($filters)
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }

    public static function show($thirdPartyID, $data)
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl.$thirdPartyID, $data);
    }
}
