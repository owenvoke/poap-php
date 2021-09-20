<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Account;
use OwenVoke\POAP\Api\Event;
use OwenVoke\POAP\Api\Token;
use OwenVoke\POAP\Client;

it('gets instances from the client', function () {
    $client = new Client();

    // Retrieves Account instance
    expect($client->account())->toBeInstanceOf(Account::class);
    expect($client->accounts())->toBeInstanceOf(Account::class);

    // Retrieves Event instance
    expect($client->event())->toBeInstanceOf(Event::class);
    expect($client->events())->toBeInstanceOf(Event::class);

    // Retrieves Token instance
    expect($client->token())->toBeInstanceOf(Token::class);
    expect($client->tokens())->toBeInstanceOf(Token::class);
});
