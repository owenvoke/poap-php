<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Token;

beforeEach(fn () => $this->apiClass = Token::class);

$singleTokenData = [
    'event' => [
        'id' => 7811,
        'fancy_id' => 'pest-php-meetup-1-2021',
        'name' => 'Pest PHP Meetup #1',
        'event_url' => 'https://pestphp.com',
        'image_url' => 'https://storage.googleapis.com/poapmedia/pest-php-meetup-1-2021-logo-1631810734471.png',
        'country' => '',
        'city' => '',
        'description' => "PEST Meetup #1: Testing Livewire with PEST & You know the REST, now it's time for Pest

Schedule:
6:00 PM - Intro

6:05 PM - “Wired Pest - Testing Livewire with Pest” by @tio_jobs

6:25 PM - “You know the REST, now it's time for Pest” by @DanSysAnalyst

6:45 PM - After Party

7:00 PM - End

Pest is an elegant PHP Testing Framework with a focus on simplicity. It was carefully crafted to bring the joy of testing to PHP.

https://youtu.be/q_8kRlAIyms",
        'year' => 2021,
        'start_date' => '22-Jun-2021',
        'end_date' => '22-Jun-2021',
        'expiry_date' => '19-Sep-2021',
    ],
    'tokenId' => '1310287',
    'owner' => '0x3ab56c8a5e4b307a60b6a769b1c083ee165d6dd6',
    'layer' => 'Layer2',
    'supply' => [
        'total' => 1,
        'order' => 1,
    ],
];

it('should get a token by its id', function () use ($singleTokenData) {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/token/1310287')
        ->willReturn($singleTokenData);

    expect($api->show(1310287))->toBe($singleTokenData);
});
