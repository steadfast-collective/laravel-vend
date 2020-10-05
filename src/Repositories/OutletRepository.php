<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\ApiRequestor;
use SteadfastCollective\LaravelVend\Contracts\OutletRepository as Contract;

class OutletRepository implements Contract
{
    private static $baseUrl = "outlets/";

    public static function index(array $filters = [])
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }

    public static function show(string $thirdPartyID, array $data = [])
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl.$thirdPartyID, $data);
    }
}
