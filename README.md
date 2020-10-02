# DHL PHP SDK

This *unofficial* library is wrapping some functions of the DHL SOAP API in order to easy create/delete shipments and labels.

## Requirements

- You need a [DHL developer Account](https://entwickler.dhl.de/) and - as long as you want to use the API in production systems - a DHL Intraship Account.
- PHP-Version 7.2 or higher _(It may work on older Versions, but I don't offer Support for these)_
- PHP-SOAP-Client installed + enabled on your Server. [More information on php.net](http://php.net/manual/en/soap.setup.php)

<br>

# Installation

## Composer

You can use [Composer](https://getcomposer.org/) to install the package to your project:

```
composer require leebmann24/dhl-php-sdk
```

The classes are then added to the autoloader automatically.

## Without Composer

If you can't use Composer (or don't want to), you can also use this SDK without it.

To initial this SDK, just require the `_nonComposerLoader.php` from the `/includes/` directory.

```php
require_once(__DIR__ . '/includes/_nonComposerLoader.php');
```

<br>

## Compatibility

This Project is written for the DHL-SOAP-API **Version 2 or higher**.

<br>

## Credits

We continue the support of https://github.com/Petschko/dhl-php-sdk which is now inactive
