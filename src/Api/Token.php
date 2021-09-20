<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

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
}
