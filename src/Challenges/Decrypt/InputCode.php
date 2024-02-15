<?php

namespace App\Challenges\Decrypt;

use App\Challenges\Decrypt\Filters\Interfaces\FilterInterface;
use App\Challenges\Decrypt\Interfaces\InputCodeInterface;

class InputCode implements InputCodeInterface
{
    /**
     * @var FilterInterface[]
     */
    private readonly array $filters;

    public function __construct(private readonly string $code, FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    public function findNumber(): int
    {
        /**
         * @var int[] $positions
         */
        $positions = [];

        foreach ($this->filters as $filter) {
            $positions = array_replace($positions, $filter->getPositions($this->code));
        }

        // Sort by position
        ksort($positions);

        $firstNumber = $positions[array_key_first($positions)] ?? 0;
        $secondNumber = $positions[array_key_last($positions)] ?? $firstNumber;

        return intval($firstNumber . $secondNumber);
    }
}
