<?php

namespace SteadfastCollective\LaravelVend\Contracts;

interface SalesRepository
{
    public static function index(array $filters = []);

    public static function show(string $thirdPartyID, array $data = []);
}
