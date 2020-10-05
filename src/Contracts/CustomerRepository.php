<?php

namespace SteadfastCollective\LaravelVend\Contracts;

interface CustomerRepository
{
    public static function index(array $filters = []);

    public static function show(string $thirdPartyID, array $data = []);

    public static function create(array $data = []);

    public static function update(string $thirdPartyID, array $data = []);

    public static function destroy(string $thirdPartyId, array $data = []);
}
