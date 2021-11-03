<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Migration;

beforeEach(fn () => $this->apiClass = Migration::class);

it('should get a signature for migrating a POAP token from xDAI to ETH', function () {
    $expectedArray = [
        'signature' => '...',
        // ...
    ];

    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/actions/migrate', ['tokenId' => 123456])
        ->willReturn($expectedArray);

    expect($api->xDaiToEthereum(123456))->toBe($expectedArray);
});
