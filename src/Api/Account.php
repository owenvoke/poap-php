<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Account extends AbstractApi
{
    public function showByAddressOrEnsName(string $addressOrEnsName): array
    {
        return $this->get("/actions/scan/{$addressOrEnsName}");
    }

    public function ensNameToAddress(string $ensName): array
    {
        return $this->get('/actions/ens_resolve', [
            'name' => $ensName,
        ]);
    }

    public function addressToEnsName(string $address): array
    {
        return $this->get("/actions/ens_lookup/{$address}");
    }
}
