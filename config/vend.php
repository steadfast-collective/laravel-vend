<?php

return [

    /**
     * Authentication
     *
     * You'll need your Vend domain prefix and a personal access
     * token in order to authenticate with the Vend API.
     */
    'domain_prefix' => env('VEND_DOMAIN_PREFIX'),
    'personal_token' => env('VEND_API_TOKEN'),

    /**
     * Pagination
     *
     * Control the pagination limits when making requests with
     * the Laravel Vend package.
     */
    'page_size' => 75,

];
