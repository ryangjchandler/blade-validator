# Run rudimentary linting checks on your Blade templates.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/blade-validator.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/blade-validator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/blade-validator/run-tests?label=tests)](https://github.com/ryangjchandler/blade-validator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/blade-validator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/blade-validator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/blade-validator.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/blade-validator)

This package provides a `blade:validate` command as well as a few useful checks for your Blade templates.

## Installation

You can install the package via composer:

```bash
composer require ryangjchandler/blade-validator
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="blade-validator-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="blade-validator-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="blade-validator-views"
```

## Usage

```php
$BladeValidator = new RyanChandler\BladeValidator();
echo $BladeValidator->echoPhrase('Hello, RyanChandler!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
