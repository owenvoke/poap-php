# Account API

[Back to the navigation](README.md)

Allows interacting with the Account API.

### Get POAP details for an ETH address or ENS name

```php
$response = $client->account()->showByAddressOrEnsName(
    '0x3ab56c8a5e4b307a60b6a769b1c083ee165d6dd6'
);
```
