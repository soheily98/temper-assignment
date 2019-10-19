<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

/**
 * Interface RecordRepository
 * @package App\Repositories\Contracts
 */
interface RecordRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection;
}
