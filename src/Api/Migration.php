<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

class Migration extends AbstractApi
{
    public function xDaiToEthereum(int $id): array
    {
        return $this->get('/actions/migrate', [
            'tokenId' => $id,
        ]);
    }
}
