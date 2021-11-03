<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Checkout;

beforeEach(fn () => $this->apiClass = Checkout::class);

it('should get a token by its slug', function () {
    $expectedArray = [
        'id' => 7811,
        'fancy_id' => 'pest-php-meetup-1-2021',
        'is_active' => true,
        // ...
    ];

    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/checkouts/test-poap')
        ->willReturn($expectedArray);

    expect($api->show('test-poap'))->toBe($expectedArray);
});

it('should redeem a checkout with a Google ReCaptcha response', function () {
    $expectedArray = [
        'qr_hash' => 'abcdefg',
    ];

    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('post')
        ->with('/checkouts/test-poap/redeem', ['gRecaptchaResponse' => 'testing'])
        ->willReturn($expectedArray);

    expect($api->redeem('test-poap', 'testing'))->toBe($expectedArray);
});
