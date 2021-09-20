<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Delivery extends AbstractApi
{
    public function all(array $parameters = []): array
    {
        return $this->get('/deliveries', $parameters);
    }

    public function show(int $id): array
    {
        return $this->get("/delivery/{$id}");
    }
}
