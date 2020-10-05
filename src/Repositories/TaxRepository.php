<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\Contracts\TaxRepository as Contract;
use SteadfastCollective\LaravelVend\LaravelVendFacade;

class TaxRepository implements Contract
{
    private static $baseUrl = "taxes/";

    public function index(array $filters = [])
    {
        return LaravelVendFacade::get(self::$baseUrl, $filters);
    }
}
