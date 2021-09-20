<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Account;

beforeEach(fn() => $this->apiClass = Account::class);

$singleAccountData = [
    [
        "event" => [
            "id" => 7811,
            "fancy_id" => "pest-php-meetup-1-2021",
            "name" => "Pest PHP Meetup #1",
            "event_url" => "https://pestphp.com",
            "image_url" => "https://storage.googleapis.com/poapmedia/pest-php-meetup-1-2021-logo-1631810734471.png",
            "country" => "",
            "city" => "",
            "description" => "PEST Meetup #1: Testing Livewire with PEST & You know the REST, now it's time for Pest

Schedule:
6:00 PM - Intro

6:05 PM - “Wired Pest - Testing Livewire with Pest” by @tio_jobs

6:25 PM - “You know the REST, now it's time for Pest” by @DanSysAnalyst

6:45 PM - After Party

7:00 PM - End

Pest is an elegant PHP Testing Framework with a focus on simplicity. It was carefully crafted to bring the joy of testing to PHP.

https://youtu.be/q_8kRlAIyms",
            "year" => 2021,
            "start_date" => "22-Jun-2021",
            "end_date" => "22-Jun-2021",
            "expiry_date" => "19-Sep-2021",
            "supply" => 1
        ],
        "tokenId" => "1310287",
        "owner" => "0x3ab56c8a5E4B307A60b6A769B1C083EE165d6dd6",
        "created" => "2021-09-16 16:59:55"
    ]
];

it('should get a user by their ETH address or ENS name', function () use ($singleAccountData) {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/actions/scan/0x3ab56c8a5E4B307A60b6A769B1C083EE165d6dd6')
        ->willReturn($singleAccountData);

    expect($api->showByAddressOrEnsName('0x3ab56c8a5E4B307A60b6A769B1C083EE165d6dd6'))->toBe($singleAccountData);
});
