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

1. Clone or copy this repo to your Magento installation under:
   app/code/Maximus_Sallam/SymfonyOverrides
2. Add the path repository to your Magento root `composer.json`:

```json
"repositories": [
  {
    "type": "path",
    "url": "app/code/Maximus_Sallam/SymfonyOverrides"
  }
]
```
3. Require the custom override:

```bash
$ composer require custom/symfony-overrides:*
$ composer dump-autoload
```
4. Clear Magento cache:

```bash
$ php bin/magento cache:clean
```
## Notes
These overrides will survive Composer updates.

This is intended as a fix for environments where forced SSL stream wrapping causes connection issues.

Use only if you are certain your infrastructure handles TLS/SSL at the appropriate layer (e.g., STARTTLS, proxies, etc.).

## License
This project is licensed under the GNU General Public License v2.0 (GPL-2.0).
See the LICENSE file for full details.
