<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use Illuminate\Support\Facades\URL;
use SteadfastCollective\LaravelVend\ApiRequestor;

class PrintMethodRepository
{
    private static $baseUrl = "printmethods/";

    public static function index($filters)
    {
        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }

    public static function create($data)
    {
        return resolve(ApiRequestor::class)->post(self::$baseUrl, $data);
    }
}
