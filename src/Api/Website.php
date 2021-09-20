<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Website extends AbstractApi
{
    public function show(int $id, string $secretCode): array
    {
        return $this->get("/website/event/id/{$id}", [
            'secret_code' => $secretCode,
        ]);
    }
}
