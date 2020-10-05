<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\Contracts\CustomerRepository as Contract;
use SteadfastCollective\LaravelVend\LaravelVendFacade;

class CustomerRepository implements Contract
{
    private static $baseUrl = "customers/";

    public static function index(array $filters = [])
    {
        return LaravelVendFacade::get(self::$baseUrl, $filters);
    }

    public static function show(string $thirdPartyID, array $data = [])
    {
        return LaravelVendFacade::get(self::$baseUrl.$thirdPartyID, $data);
    }

    public static function create(array $data = [])
    {
        return LaravelVendFacade::post(self::$baseUrl, $data);
    }

    public static function update(string $thirdPartyID, array $data = [])
    {
        return LaravelVendFacade::put(self::$baseUrl.$thirdPartyID, $data);
    }

    public static function destroy(string $thirdPartyId, array $data = [])
    {
        return LaravelVendFacade::delete(self::$baseUrl.$thirdPartyId, $data);
    }
}
