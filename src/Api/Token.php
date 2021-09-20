<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Token extends AbstractApi
{
    public function show(int $id): array
    {
        return $this->get("/token/{$id}");
    }
}
