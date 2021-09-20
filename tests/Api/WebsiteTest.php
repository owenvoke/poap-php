<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Website;

beforeEach(fn () => $this->apiClass = Website::class);

it('should get a website by its id', function () {
    $singleWebsiteData = [
        'id' => 7811,
    ];

    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/website/event/id/7811', ['secret_code' => '123456'])
        ->willReturn($singleWebsiteData);

    expect($api->show(7811, '123456'))->toBe($singleWebsiteData);
});
