# Instant feedback for your Laravel validation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vincentkos/blur-validation.svg?style=flat-square)](https://packagist.org/packages/vincentkos/blur-validation)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/vincentkosciuszko/blur-validation/run-tests?label=tests)](https://github.com/vincentkosciuszko/blur-validation/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/vincentkosciuszko/blur-validation/Check%20&%20fix%20styling?label=code%20style)](https://github.com/vincentkosciuszko/blur-validation/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/vincentkos/blur-validation.svg?style=flat-square)](https://packagist.org/packages/vincentkos/blur-validation)

Using this package you can easily validation form with instant feedback without writing any javascript.

## Installation

You can install the package via composer:

```bash
composer require vincentkos/blur-validation
```

You need to publish the javascript using :
```bash
php artisan vendor:publish --provider="Vincentkos\BlurValidation\BlurValidationServiceProvider" --tag="blur-validation"
```

## Usage

For this package to work you need to have a meta tag with the name `csrf-token` and a `content` attribute with the current csrf token.

```html
<meta name="csrf-token" content="{{ csrf_token() }}" />
```

Then you can start validating your form using the `validation:rules` attribute and `validation:error` like this :

```html
<div>
    <label for="email">Email address:</label>
    <input type="text" name="email" id="email" validate:rules="required|email|unique:users">
    <span validate:error="email"></span>
</div>
```

When the user leave the `input` the validation will be trigger and if an error is returned it will be written inside the `span`. Errors are displayed in the first matching tag and it's always the first error returned.

If you need to integrate this package with other tools such as alpine, react, lit etc ... you should use the `blur-validation.validate` without including the javascript.

## Limitation

* In it's current state this package cannot hide or show the error tag, this limitation is due to the fact that I don't need it right now but PR are welcome if you want to implement this.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Vincent Kosciuszko](https://github.com/vincentkosciuszko)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
