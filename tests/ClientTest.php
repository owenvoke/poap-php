<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Account;
use OwenVoke\POAP\Api\Checkout;
use OwenVoke\POAP\Api\Delivery;
use OwenVoke\POAP\Api\Event;
use OwenVoke\POAP\Api\Migration;
use OwenVoke\POAP\Api\Queue;
use OwenVoke\POAP\Api\Token;
use OwenVoke\POAP\Api\Website;
use OwenVoke\POAP\Client;

it('gets instances from the client', function () {
    $client = new Client();

    // Retrieves Account instance
    expect($client->account())->toBeInstanceOf(Account::class);
    expect($client->accounts())->toBeInstanceOf(Account::class);

    // Retrieves Checkout instance
    expect($client->checkout())->toBeInstanceOf(Checkout::class);
    expect($client->checkouts())->toBeInstanceOf(Checkout::class);

    // Retrieves Delivery instance
    expect($client->delivery())->toBeInstanceOf(Delivery::class);
    expect($client->deliveries())->toBeInstanceOf(Delivery::class);

    // Retrieves Event instance
    expect($client->event())->toBeInstanceOf(Event::class);
    expect($client->events())->toBeInstanceOf(Event::class);

    // Retrieves Migration instance
    expect($client->migrate())->toBeInstanceOf(Migration::class);
    expect($client->migrates())->toBeInstanceOf(Migration::class);
    expect($client->migration())->toBeInstanceOf(Migration::class);
    expect($client->migrations())->toBeInstanceOf(Migration::class);

    // Retrieves Queue instance
    expect($client->queue())->toBeInstanceOf(Queue::class);
    expect($client->queues())->toBeInstanceOf(Queue::class);

    // Retrieves Token instance
    expect($client->token())->toBeInstanceOf(Token::class);
    expect($client->tokens())->toBeInstanceOf(Token::class);

    // Retrieves Website instance
    expect($client->website())->toBeInstanceOf(Website::class);
    expect($client->websites())->toBeInstanceOf(Website::class);
});
