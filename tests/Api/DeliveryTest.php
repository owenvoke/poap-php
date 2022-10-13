<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Delivery;

beforeEach(fn () => $this->apiClass = Delivery::class);

$singleDeliveryData = [
    'id' => 42,
    'slug' => 'alchemix-legends-2021',
    'card_title' => 'Alchemix Legends',
    'card_text' => 'This one goes out to all the Legends that helped the old Alchemist get back on its feet.',
    'metadata_title' => '⚗️ Alchemix Legends',
    'metadata_description' => 'This one goes out to all the Legends that helped the old Alchemist get back on its feet.',
    'page_title' => '⚗️ Alchemix Legends',
    'page_title_image' => '',
    'page_text' => 'This one goes out to all the Legends that helped the old Alchemist get back on its feet.',
    'event_ids' => '3883',
    'image' => 'https://storage.googleapis.com/poapmedia/alchemix-legends-2021-logo-1625687701998.png',
    'active' => true,
];

it('should get all deliveries', function () use ($singleDeliveryData) {
    $response = [
        'limit' => 10,
        'offset' => 0,
        'total' => 1,
        'deliveries' => [$singleDeliveryData],
    ];

    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/deliveries')
        ->willReturn($response);

    /** @var Delivery $api */
    expect($api->all())->toBe($response);
});

it('should get a delivery by its id', function () use ($singleDeliveryData) {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/delivery/42')
        ->willReturn($singleDeliveryData);

    /** @var Delivery $api */
    expect($api->show(42))->toBe($singleDeliveryData);
});
