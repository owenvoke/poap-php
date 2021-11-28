<?php

declare(strict_types=1);

use OwenVoke\POAP\Api\Event;

beforeEach(fn () => $this->apiClass = Event::class);

$singleEventData = [
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
    'from_admin' => false,
    'virtual_event' => true,
    'event_template_id' => 0,
    'event_host_id' => 0,
];

it('should get all events', function () use ($singleEventData) {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/events')
        ->willReturn([$singleEventData]);

    expect($api->all())->toBe([$singleEventData]);
});

it('should get an event by its id', function () use ($singleEventData) {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/events/id/7811')
        ->willReturn($singleEventData);

    expect($api->show(7811))->toBe($singleEventData);
});

it('should get an event by its slug', function () use ($singleEventData) {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('get')
        ->with('/events/pest-php-meetup-1-2021')
        ->willReturn($singleEventData);

    expect($api->showBySlug('pest-php-meetup-1-2021'))->toBe($singleEventData);
});

it('should validate an events secret code', function () {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('post')
        ->with('/events/validate', [
            'event_id' => 7811,
            'secret_code' => '123456',
        ])
        ->willReturn(['valid' => true]);

    expect($api->validate(7811, '123456'))->toBe(['valid' => true]);
});

it('should retrieve an events codes', function () {
    $api = $this->getApiMock();

    $api->expects($this->once())
        ->method('post')
        ->with('/event/7811/qr-codes', [
            'secret_code' => '123456',
        ])
        ->willReturn(['valid' => true]);

    expect($api->codes(7811, '123456'))->toBe(['valid' => true]);
});
