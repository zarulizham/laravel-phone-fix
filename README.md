# This is my package laravel-phone-fix

## Installation

You can install the package via composer:

```bash
composer require zarulizham/laravel-phone-fix
```


## Usage

```php
PhoneFix::fix('0123456789');
// 60123456789

PhoneFix::fix('123456789');
// 60123456789

PhoneFix::fix('60123456789');
// 60123456789
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Zarul Zubir](https://github.com/zarulizham)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
