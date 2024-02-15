<?php

namespace Challenges\Decrypt\Filters;

use App\Challenges\Decrypt\Enums\NumberEnum;
use App\Challenges\Decrypt\Filters\ParseNumberFilter;
use PHPUnit\Framework\TestCase;

class ParseNumberFilterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testGetPositions($code, $expectation)
    {
        $filter = new ParseNumberFilter(NumberEnum::cases());

        $this->assertEquals($expectation, $filter->getPositions($code));
    }

    public function dataProvider(): array
    {
        return [
            ['', []],
            ['one1', [0 => 1]],
            ['34two89', [2 => 2]],
            ['34two89seven', [2 => 2, 7 => 7]],
            ['oneightwothreeightwonineseveninesixfivefour', [
                0 => 1,
                2 => 8,
                6 => 2,
                9 => 3,
                13 => 8,
                17 => 2,
                39 => 4,
                35 => 5,
                32 => 6,
                24 => 7,
                20 => 9,
                28 => 9,
            ]]
        ];
    }
}
