<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use SteadfastCollective\LaravelVend\ApiRequestor;
use SteadfastCollective\LaravelVend\Contracts\TaxRepository as Contract;

class TaxRepository implements Contract
{
    private static $baseUrl = "taxes/";

    public function index(array $filters = [])
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }
}
