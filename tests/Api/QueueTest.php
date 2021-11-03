<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Queue;

beforeEach(fn () => $this->apiClass = Queue::class);

it('should get a queued message by its id', function () {
    $expectedArray = [
        'uid' => '1ec3ece2-fb33-4668-b446-7369c43d9013',
        // ...
    ];

    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/queue-message/1ec3ece2-fb33-4668-b446-7369c43d9013')
        ->willReturn($expectedArray);

    expect($api->show('1ec3ece2-fb33-4668-b446-7369c43d9013'))->toBe($expectedArray);
});
