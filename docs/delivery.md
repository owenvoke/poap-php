# Delivery API

[Back to the navigation](README.md)

Allows interacting with the Delivery API.

### Get a list of all deliveries

```php
$response = $client->delivery()->all();
```

### Get details about a delivery

```php
$response = $client->delivery()->show(42);
```
