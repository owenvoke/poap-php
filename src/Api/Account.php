<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Account extends AbstractApi
{
    public function showByAddressOrEnsName(string $addressOrEnsName): array
    {
        return $this->get("/actions/scan/{$addressOrEnsName}");
    }
}
