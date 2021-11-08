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

    public function ownedBy(int $eventId, string $addressOrEnsName): array
    {
        return (new Account($this->getClient()))->ownsEventToken($addressOrEnsName, $eventId);
    }

    public function claim(string $code, string $address): array
    {
        $secret = $this->claimSecret($code);

        return $this->post('/actions/claim-qr', [
            'address' => $address,
            'qr_hash' => $code,
            'secret' => $secret,
        ]);
    }

    public function claimSecret(string $code): string
    {
        $response = $this->get('/actions/claim-qr', [
            'qr_hash' => $code,
        ]);

        if (! isset($response['secret'], $response['claimed'], $response['is_active'])) {
            throw new InvalidArgumentException('The required response values could not be found');
        }

        if (! $response['secret']) {
            throw new InvalidArgumentException('A secret could not be retrieved from the provided code');
        }

        if ($response['claimed'] === true) {
            throw new InvalidArgumentException('The provided code has already been claimed');
        }

        if (! $response['is_active']) {
            throw new InvalidArgumentException('The provided code is no longer active');
        }

        return $response['secret'];
    }
}
