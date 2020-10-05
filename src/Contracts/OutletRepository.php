<?php

namespace SteadfastCollective\LaravelVend\Contracts;

interface OutletRepository
{
    public static function index(array $filters = []);

    public static function show(string $thirdPartyID, array $data = []);
}
