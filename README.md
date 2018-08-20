# Laravel Favicon Extractor

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stefanbauer/laravel-favicon-extractor.svg?style=flat-square)](https://packagist.org/packages/stefanbauer/laravel-favicon-extractor)
[![Build Status](https://img.shields.io/travis/stefanbauer/laravel-favicon-extractor/master.svg?style=flat-square)](https://travis-ci.org/stefanbauer/laravel-favicon-extractor)
[![Total Downloads](https://img.shields.io/packagist/dt/stefanbauer/laravel-favicon-extractor.svg?style=flat-square)](https://packagist.org/packages/stefanbauer/laravel-favicon-extractor)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package provides a convenient way to extract a favicon from any website by using the appropriate Google service. It allows you to fetch and save it to your local storage.

## Usage

Usage is very simple. You can either pull it in via Dependency Injection or use the Facade.

- For the Dependency Injection version, type hint the `FaviconExtractorInterface`.
- For the Facade version, use the `FaviconExtractor` Facade.

### General

- If no favicon could be found, it returns a default one.
- The favicon's extension is always `.png`. It's not necessary to be part of your filename.

### Fetch the favicon only

```php
$favicon = FaviconExtractor::fromUrl('https://laravel.com')->fetchOnly();
```

It returns a instance which implements `FaviconInterface` where you can retrieve the raw content of the favicon with `$favicon->getContent()`. 

### Fetch and download the favicon 

If you prefer to save the favicon to your local storage, you can. The only requirement is to define the path, where the favicon should be saved. It's relative to your root path which you defined in `config/filesystems.php`. Saying your path to save is `favicons`, it will be saved to `app/storage/favicons`.

#### With a random generated filename

```php
FaviconExtractor::fromUrl('https://laravel.com')->fetchAndSaveTo('favicons');
// returns favicons/HIgLtwL0iUdNkwfq.png
```

#### With a custom filename

```php
FaviconExtractor::fromUrl('https://laravel.com')->fetchAndSaveTo('favicons', 'myFilename');
// returns favicons/myFilename.png
```

## Installation

To install this package, require it via composer.

```shell
$ composer require stefanbauer/laravel-favicon-extractor
```

Thanks to Laravel 5.5+ Package Auto-Discovery, there is no need to add the ServiceProvider manually. If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`.

```php
StefanBauer\LaravelFaviconExtractor\FaviconExtractorServiceProvider::class,
```

If you want to use the facade, add this to your facades array in `config/app.php`.

```php
'FaviconExtractor' => StefanBauer\LaravelFaviconExtractor\Facades\FaviconExtractor::class,
```

## Configuration

If you would like to modify the configuration, use the publish command to copy the package config over.

```shell
php artisan vendor:publish --provider="StefanBauer\LaravelFaviconExtractor\FaviconExtractorServiceProvider" --tag="config"
```

The configuration file has only two options you can change. The `provider_class` and the `filename_generator_class`. In general, there is no need to change it, unless you like to have a different implementations how the favicon is fetched and how the filename is generated. Pleae take care of implementing the corresponding interfaces.

## Testing

```shell
$ vendor/bin/phpunit
```

## Changelog

Please take a look at the [CHANGELOG](CHANGELOG.md) what has changed recently.

## Contributing

Please take a look at [CONTRIBUTING](CONTRIBUTING.md) for more information.

## License

The MIT License (MIT). Please take a look at the [LICENSE](LICENSE.md) for more information.
