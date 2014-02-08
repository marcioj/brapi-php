# Brapi.io PHP Client

[![Build Status](https://travis-ci.org/Helabs/brapi-php.png)](https://travis-ci.org/Helabs/brapi-php)

PHP package to interact with the brapi.io APIs

## Installation

Add this line to your `composer.json`:

```json
{
  "require": {
    "helabs/brapi": "dev-master"
  }
}
```

And then install it:

```shell
$ composer install
```

## Usage

### Initializing the client

You will need to have your account's access_token to be able to interact with the API. You also need to set an 'User-Agent' to identify your application.

```php
<?php
$access_token = 'your-access-token'
$user_agent = 'Your Application Name (youremail@provider.com)'

$Brapi = new \Brapi\Client($access_token, $user_agent);
```

### Zipcodes

You can search for zipcodes by using the `#zipcode` method on the client. This method will return an instance of `\Brapi\Zipcode` so you can use it like a plain object.

```php
<?php
$zipcode = $Brapi->zipcode('20071003');

// Now you have all the information you need:
$zipcode->address // Presidente Vargas
$zipcode->address_type // Avenida
$zipcode->city // Rio de Janeiro
$zipcode->city_ibge_code // 3304557
$zipcode->neighborhood // Centro
$zipcode->state // RJ
$zipcode->zipcode // 20071003
```

## Versioning

Brapi.io PHP Client follow the [Semantic Versioning](http://semver.org/).

## Issues

If you have problems, please create a [Github Issue](https://github.com/Helabs/brapi-php/issues).

## Contributing

Please see [CONTRIBUTING.md](https://github.com/Helabs/brapi-php/blob/master/CONTRIBUTING.md) for details.

## Release

TODO

## Credits

Brapi.io PHP Client is maintained and funded by [HE:labs](http://helabs.com.br/opensource/).
Thank you to all the [contributors](https://github.com/Helabs/brapi-php/graphs/contributors).
