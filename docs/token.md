# Token API

[Back to the navigation](README.md)

Allows interacting with the Token API.

### Get details about a POAP token

```php
$response = $client->token()->show(1310287);
```

### Get the image for a POAP token

```php
$response = $client->token()->image(1310287);
```

### Get the metadata for a POAP token

```php
$response = $client->token()->metadata(7811, 1310287);
```
