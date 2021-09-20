<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

use OwenVoke\POAP\Exception\InvalidArgumentException;

class Token extends AbstractApi
{
    public function show(int $id): array
    {
        return $this->get("/token/{$id}");
    }

    public function image(int $id): string
    {
        return $this->get("/token/{$id}/image");
    }

    public function metadata(int $eventId, int $tokenId): array
    {
        return $this->get("/metadata/{$eventId}/{$tokenId}");
    }

    public function claim(string $code, string $address): array
    {
        $response = $this->get('/actions/claim-qr', [
            'qr_hash' => $code,
        ]);

        if (! $response['secret']) {
            throw new InvalidArgumentException('A secret could not be retrieved from the provided code');
        }

        if ($response['claimed'] === true) {
            throw new InvalidArgumentException('The provided code has already been claimed');
        }

        if (! $response['active']) {
            throw new InvalidArgumentException('The provided code is no longer active');
        }

        return $this->post('/actions/claim-qr', [
            'address' => $address,
            'qr_hash' => $code,
            'secret' => $response['secret'],
        ]);
    }
}
