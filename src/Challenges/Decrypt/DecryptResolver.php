<?php

namespace App\Challenges\Decrypt;

use App\Challenges\Decrypt\Interfaces\InputCodeInterface;
use App\Interfaces\ChallengeInterface;

class DecryptResolver implements ChallengeInterface
{
    /**
     * @var InputCodeInterface[]
     */
    private readonly array $inputCodes;

    public function __construct(InputCodeInterface ...$inputCodes)
    {
        $this->inputCodes = $inputCodes;
    }

    public function execute(): int
    {
        $numbers = array_map(fn (InputCodeInterface $inputCode) => $inputCode->findNumber(), $this->inputCodes);

        return array_sum($numbers);
    }
}
