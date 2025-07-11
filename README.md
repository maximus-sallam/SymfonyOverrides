# SymfonyOverrides for Magento 2

This package provides clean overrides for two Symfony components used internally by Magento 2:

- `Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream`
- `Symfony\Component\HttpClient\HttpClientTrait`

## Purpose

Magento 2 includes Symfony packages which, by default, force the use of `'ssl://'` in certain transport URLs. This behavior can cause SMTP and proxy connection failures in environments where SSL-wrapped streams are not appropriate.

This package prevents `'ssl://'` from being automatically prepended to transport URLs, without modifying `vendor/` files directly.

## Changes

- Removed string concatenation of `'ssl://'` in `SocketStream.php`
- Removed string concatenation of `'ssl://'` in `HttpClientTrait.php`

## Installation

1. Clone this repository into your Magento installation under:
   app/code/MaximusSallam/SymfonyOverrides/
```bash
$ git clone https://github.com/maximus-sallam/SymfonyOverrides.git app/code/MaximusSallam/SymfonyOverrides/
```

2. Run the following to enable the module:
```bash
$ php bin/magento module:enable MaximusSallam_SymfonyOverrides
```

3. Once the module is enabled, run the following commands to apply your changes:
```bash
$ php bin/magento setup:upgrade
$ php bin/magento setup:di:compile
$ php bin/magento setup:static-content:deploy
```
This will update Magento's setup and register your new module, compile Magento, and deploy your static content.

4. Clear Magento cache:
```bash
$ php bin/magento cache:flush
```

## Notes

These overrides will survive Composer updates.

This is intended as a fix for environments where forced SSL stream wrapping causes connection issues.

Use only if you are certain your infrastructure handles TLS/SSL at the appropriate layer (e.g., STARTTLS, proxies, etc.).

## License

This project is licensed under the GNU General Public License v2.0 (GPL-2.0).

See the LICENSE file for full details.
