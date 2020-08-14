<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\ApiRequestor;

class CustomerRepository
{
    private static $baseUrl = "customers/";

    public static function index($filters)
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }

    public static function show($thirdPartyID, $data)
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl.$thirdPartyID, $data);
    }

    public static function create($data)
    {
        return resolve(ApiRequestor::class)->post(self::$baseUrl, $data);
    }

    public static function update($thirdPartyID, $data)
    {
        return resolve(ApiRequestor::class)->put(self::$baseUrl.$thirdPartyID, $data);
    }

    public static function destroy($thirdPartyId, $data)
    {
        return resolve(ApiRequestor::class)->delete(self::$baseUrl.$thirdPartyID, $data);
    }
}
