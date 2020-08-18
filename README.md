# Laravel Vend

[![Latest Version on Packagist](https://img.shields.io/packagist/v/steadfastcollective/laravel-vend.svg?style=flat-square)](https://packagist.org/packages/steadfastcollective/laravel-vend)
[![Build Status](https://img.shields.io/travis/steadfastcollective/laravel-vend/master.svg?style=flat-square)](https://travis-ci.org/steadfastcollective/laravel-vend)
[![Quality Score](https://img.shields.io/scrutinizer/g/steadfastcollective/laravel-vend.svg?style=flat-square)](https://scrutinizer-ci.com/g/steadfastcollective/laravel-vend)
[![Total Downloads](https://img.shields.io/packagist/dt/steadfastcollective/laravek-vend.svg?style=flat-square)](https://packagist.org/packages/steadfastcollective/laravel-vend)

Laravel Vend is a Laravel package to help communicate with the Vend ePOS API. This package currently only has support for three resource types from Vend:

* Customers
* Products
* Sales

If you need any others, feel free to [create a pull request](https://github.com/steadfast-collective/laravel-vend/compare).

## Installation

1. Install via Composer `composer require steadfastcollective/laravel-vend`
2. Publish Vend configuration file `php artisan vendor:publish --tag="vend-config"`

## Configuration

During install, a `vend.php` configuration file is published to your application's `config` directory.

```php
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
```

Here's a brief breakdown of each config option:

* `domain_prefix` - Each Vend instance has its own subdomain, which we refer to as a domain prefix. For example if your Vend URL is `steadfastcollective.vendhq.com` then your domain prefix will be `steadfastcollective`.
* `personal_token` should be a Personal Access Token created in the Vend system.
* `page_size` determines the amount of items that should be returned by the Vend API per request.

## Usage

Below is an example of fetching the customers index, you could of course use this same code for any of the resources with an `index` method. The `index` method requires for an array of parameters to be passed in, this can be empty if you don't wish to use any parameters.

``` php
use SteadfastCollective\LaravelVend\Repositories\CustomerRepository;

// Let's return our store's customers
return CustomerRepository::index([]);
```

Regarding pagination, you need to provide the `after` parameter and give it the `version.max` value from the last request.

## To Do
* Rate limiting, deal with it https://docs.vendhq.com/reference/introduction/rate-limiting

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dev@steadfastcollective.com instead of using the issue tracker.

## Credits

- [Steadfast Collective](https://github.com/steadfastcollective)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
