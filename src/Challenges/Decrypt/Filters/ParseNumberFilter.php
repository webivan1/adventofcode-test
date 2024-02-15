<?php

namespace App\Challenges\Decrypt\Filters;

use App\Challenges\Decrypt\Enums\NumberEnum;
use App\Challenges\Decrypt\Filters\Interfaces\FilterInterface;

class ParseNumberFilter implements FilterInterface
{
    /**
     * @param NumberEnum[] $numbers
     */
    public function __construct(private readonly array $numbers)
    {
    }

    /**
     * @inheritDoc
     */
    public function getPositions(string $code): array
    {
        /**
         * @var int[] $positions
         */
        $positions = [];

        foreach ($this->numbers as $case) {
            $len = strlen($case->name);

            for ($i = 0; $i < strlen($code); $i++) {
                if (substr($code, $i, $len) === $case->name) {
                    $positions[$i] = $case->value;
                }
            }
        }

        return $positions;
    }
}
