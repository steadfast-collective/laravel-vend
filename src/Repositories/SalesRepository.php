<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\Contracts\SalesRepository as Contract;
use SteadfastCollective\LaravelVend\LaravelVendFacade;

class SalesRepository implements Contract
{
    private static $baseUrl = "sales/";

    public static function index(array $filters = [])
    {
        return LaravelVendFacade::get(self::$baseUrl, $filters);
    }

    public static function show(string $thirdPartyID, array $data = [])
    {
        return LaravelVendFacade::get(self::$baseUrl.$thirdPartyID, $data);
    }
}
