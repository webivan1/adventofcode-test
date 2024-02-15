<?php

namespace App\Challenges\Decrypt\Filters\Interfaces;

interface FilterInterface
{
    /**
     * @return int[]
     */
    public function getPositions(string $code): array;
}
