<?php

namespace App\Challenges\Decrypt;

use App\Challenges\Decrypt\Enums\NumberEnum;
use App\Challenges\Decrypt\Interfaces\InputCodeInterface;

class InputCode implements InputCodeInterface
{
    public function __construct(private readonly string $code)
    {
    }

    public function findNumber(): int
    {
        /**
         * @var int[] $positions
         */
        $positions = [];

        foreach (NumberEnum::cases() as $case) {
            $len = strlen($case->name);

            for ($i = 0; $i < strlen($this->code); $i++) {
                if (is_numeric($this->code[$i])) {
                    $positions[$i] = (int) $this->code[$i];
                }

                if (substr($this->code, $i, $len) === $case->name) {
                    $positions[$i] = $case->value;
                }
            }
        }

        // Sort by position
        ksort($positions);

        $firstNumber = $positions[array_key_first($positions)] ?? 0;
        $secondNumber = $positions[array_key_last($positions)] ?? $firstNumber;

        return intval($firstNumber . $secondNumber);
    }
}
