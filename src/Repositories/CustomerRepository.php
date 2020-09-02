<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\ApiRequestor;

class CustomerRepository
{
    private static $baseUrl = "customers/";

    public static function index(array $filters = [])
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }

    public static function show(string $thirdPartyID, array $data = [])
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl.$thirdPartyID, $data);
    }

    public static function create(array $data = [])
    {
        return resolve(ApiRequestor::class)->post(self::$baseUrl, $data);
    }

    public static function update(string $thirdPartyID, array $data = [])
    {
        return resolve(ApiRequestor::class)->put(self::$baseUrl.$thirdPartyID, $data);
    }

    public static function destroy(string $thirdPartyId, array $data = [])
    {
        return resolve(ApiRequestor::class)->delete(self::$baseUrl.$thirdPartyId, $data);
    }
}
