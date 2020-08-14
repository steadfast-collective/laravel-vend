<?php

namespace SteadfastCollective\LaravelVend\Repositories;

use Illuminate\Support\Facades\URL;
use SteadfastCollective\LaravelVend\ApiRequestor;

class ContactRepository
{
    private static $baseUrl = "contacts/";

    public static function index($filters)
    {
        if (isset($filters['customerID'])) {
            return resolve(ApiRequestor::class)->get(self::$baseUrl . $filters['customerID'], []);
        }

        return resolve(ApiRequestor::class)->get(self::$baseUrl, $filters);
    }

    public static function create($data)
    {
        return resolve(ApiRequestor::class)->post(self::$baseUrl, $data);
    }

    public static function update($contactId, $data)
    {
        return resolve(ApiRequestor::class)->put(self::$baseUrl . $contactId, $data);
    }
}
