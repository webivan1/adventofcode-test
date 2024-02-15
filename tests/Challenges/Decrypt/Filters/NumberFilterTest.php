<?php

namespace Challenges\Decrypt\Filters;

use App\Challenges\Decrypt\Filters\NumberFilter;
use PHPUnit\Framework\TestCase;

class NumberFilterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testGetPositions($code, $expectation)
    {
        $filter = new NumberFilter();

        $this->assertEquals($expectation, $filter->getPositions($code));
    }

    public function dataProvider(): array
    {
        return [
            ['', []],
            ['one1', [3 => 1]],
            ['34two89', [0 => 3, 1 => 4, 5 => 8, 6 => 9]],
        ];
    }
}
