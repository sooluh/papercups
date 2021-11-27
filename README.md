# Papercups PHP

[![Latest Stable Version](http://poser.pugx.org/sooluh/papercups/v)](https://packagist.org/packages/sooluh/papercups)
[![Total Downloads](http://poser.pugx.org/sooluh/papercups/downloads)](https://packagist.org/packages/sooluh/papercups)
[![Latest Unstable Version](http://poser.pugx.org/sooluh/papercups/v/unstable)](https://packagist.org/packages/sooluh/papercups)
[![License](http://poser.pugx.org/sooluh/papercups/license)](https://packagist.org/packages/sooluh/papercups)

Unofficial Papercups PHP library provides convenient access to the Papercups API from applications written in server-side PHP.

## Requirements

- PHP >= 7.3
- Composer

## Features

- PSR-4 autoloading compliant structure
- PSR-2 compliant code style
- Easy to use with any framework or even a plain php file
- Useful tools for better code included

## Installation

Install the package with:

```sh
composer require sooluh/papercups
```

## Usage

The package needs to be configured with an API key, which is available in the [Papercups dashboard](https://app.papercups.io/developers/personal-api-keys). Require the package with the key's value:

```php
<?php
// make sure composer dependencies have been installed
require __DIR__ . '/vendor/autoload.php';

$papercups = new \Papercups\Client('PAPERCUPS_API_KEY');

$response = $papercups->messages()->create([
    'body' => 'Hello world!',
    'conversation_id' => '...'
]);

print_r($response);
```

If you're self-hosting Papercups on a different server, you can specify the API host:

```php
$papercups = new \Papercups\Client('PAPERCUPS_API_KEY', 'https://papercups.mycompany.co');
```

## License

Code licensed under [MIT License](./LICENSE).
