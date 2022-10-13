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

    /** @var Website $api */
    expect($api->show(7811, '123456'))->toBe($singleWebsiteData);
});

it('claim get a website', function () {
    $singleWebsiteData = [
        'id' => 7811,
    ];

    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/website/claim', [
            'website' => 'test-website',
            'address' => '0x3ab56c8a5E4B307A60b6A769B1C083EE165d6dd6',
        ])
        ->willReturn($singleWebsiteData);

    /** @var Website $api */
    expect($api->claim('test-website', '0x3ab56c8a5E4B307A60b6A769B1C083EE165d6dd6'))->toBe($singleWebsiteData);
});
