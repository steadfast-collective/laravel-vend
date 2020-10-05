<?php

namespace SteadfastCollective\LaravelVend\Contracts;

interface TaxRepository
{
    public function index(array $filters = []);
}
