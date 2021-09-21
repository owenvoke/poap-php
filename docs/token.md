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

### Claim a POAP token code

```php
$response = $client->token()->claim(
    'abcdef',
    '0x3ab56c8a5E4B307A60b6A769B1C083EE165d6dd6'
);
```

### Get the secret for a POAP token code

```php
$response = $client->token()->claimSecret(
    'abcdef'
);
```
