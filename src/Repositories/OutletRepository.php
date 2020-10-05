<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\Contracts\OutletRepository as Contract;
use SteadfastCollective\LaravelVend\LaravelVendFacade;

class OutletRepository implements Contract
{
    private static $baseUrl = "outlets/";

    public static function index(array $filters = [])
    {
        return LaravelVendFacade::get(self::$baseUrl, $filters);
    }

    public static function show(string $thirdPartyID, array $data = [])
    {
        return LaravelVendFacade::->get(self::$baseUrl.$thirdPartyID, $data);
    }
}
