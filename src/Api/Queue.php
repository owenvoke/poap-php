<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Queue extends AbstractApi
{
    public function show(string $id): array
    {
        return $this->get("/queue-message/{$id}");
    }
}
