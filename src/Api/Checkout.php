<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Checkout extends AbstractApi
{
    public function show(string $slug): array
    {
        return $this->get("/checkouts/{$slug}");
    }

    public function redeem(string $slug, string $googleRecaptchaResponse): array
    {
        return $this->post("/checkouts/{$slug}/redeem", [
            'gRecaptchaResponse' => $googleRecaptchaResponse,
        ]);
    }
}
