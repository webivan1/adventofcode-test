<?php

namespace App\Challenges\Decrypt\Filters;

use App\Challenges\Decrypt\Filters\Interfaces\FilterInterface;

class NumberFilter implements FilterInterface
{
    /**
     * @inheritDoc
     */
    public function getPositions(string $code): array
    {
        /**
         * @var int[] $positions
         */
        $positions = [];

        for ($i = 0; $i < strlen($code); $i++) {
            if (is_numeric($code[$i])) {
                $positions[$i] = (int) $code[$i];
            }
        }

        return $positions;
    }
}
