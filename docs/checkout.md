# Checkout API

[Back to the navigation](README.md)

Allows interacting with the Checkout API.

### Get details for a specific checkout

```php
$response = $client->checkout()->show('pest-php-meetup-1-2021');
```

### Redeem a checkout

```php
$response = $client->checkout()->redeem(
    'pest-php-meetup-1-2021',
    $googleRecaptchaResponse
);
```
