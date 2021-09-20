<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Event;
use OwenVoke\POAP\Client;

it('gets instances from the client', function () {
    $client = new Client();

    // Retrieves Event instance
    expect($client->event())->toBeInstanceOf(Event::class);
    expect($client->events())->toBeInstanceOf(Event::class);
});
