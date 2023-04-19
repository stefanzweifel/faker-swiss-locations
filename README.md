# faker-swiss-locations

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wnx/faker-swiss-locations.svg?style=flat-square)](https://packagist.org/packages/wnx/faker-swiss-locations)
[![Tests](https://github.com/stefanzweifel/faker-swiss-locations/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/stefanzweifel/faker-swiss-locations/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/wnx/faker-swiss-locations.svg?style=flat-square)](https://packagist.org/packages/wnx/faker-swiss-locations)

Faker provider to generate random valid Swiss locations.

## Installation

You can install the package via composer:

```bash
composer require wnx/faker-swiss-locations
```

## Usage

You first need to add the `Location` provider to Faker.

```php
// Add Location Provider to Faker
$faker = Factory::create();
$faker->addProvider(new Wnx\FakerSwissLocations\Provider\Location($faker));
```

You can now call the `postcode()`, `city()` or `canton()` method on faker to get a random valid Swiss location.

> **Note**
> Calling `postcode()`, `city()` or `canton()` always returns a new random location. If you need the same location for `postcode`, `city` and `canton` use the `location()`-method and access the properties from the instance.

```php
// 8000
$faker->postcode();

// Zürich
$faker->city();

// Instance of Wnx\SwissCantons\Canton
$faker->canton();
$faker->canton()->getName(); // Zürich
$faker->canton()->getAbbreviation(); // ZH
```

Or you can call the `location()` method to get a `\Wnx\FakerSwissLocations\Location`-instance. You can access postcode, city and canton from this object too.

```php
// Instance of \Wnx\FakerSwissLocations\Location
$location = $faker->location();

$location->postcode; // 8000
$location->city; // Zürich
$location->canton; // Instance of Wnx\SwissCantons\Canton
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Stefan Zweifel](https://github.com/stefanzweifel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
