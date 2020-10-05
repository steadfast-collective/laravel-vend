<?php

namespace SteadfastCollective\LaravelVend;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SteadfastCollective\LaravelVend\ApiRequestor
 */
class LaravelVendFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelVend';
    }
}
