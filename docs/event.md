# Event API

[Back to the navigation](README.md)

Allows interacting with the Event API.

### Get a list of all events

```php
$response = $client->event()->all();
```

### Get details about a POAP event

```php
$response = $client->event()->show(7811);
```

### Get details about a POAP event by its slug

```php
$response = $client->event()->showBySlug('pest-php-meetup-1-2021');
```

### Validate an events secret code

```php
$response = $client->event()->validate(7811, '123456');
```

### Create a new event

```php
$response = $client->event()->create(
    'The Event Name',
    __DIR__.'/../test.png',
    'The event description...',
    YOUR_SECRET_CODE,
    [
        'email' => '...',
        'private_event' => true,
        'event_url' => 'https://...',
        'country' => '',
        'city' => '',
        'year' => date('Y'),
        'start_date' => date('Y-m-d'),
        'end_date' => date('Y-m-d', strtotime('+1 day')),
        'expiry_date' => date('Y-m-d', strtotime('+1 month')),
    ]
);
```
