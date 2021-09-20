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
