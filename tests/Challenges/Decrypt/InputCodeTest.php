<?php

namespace Tests\Challenges\Decrypt;

use App\Challenges\Decrypt\InputCode;
use PHPUnit\Framework\TestCase;

class InputCodeTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @testdox should find number $expectation when code is $code
     */
    public function testFindNumber($code, $expectation)
    {
        $inputCode = new InputCode($code);

        $this->assertEquals($expectation, $inputCode->findNumber());
    }

    public function dataProvider(): array
    {
        return [
            ['', 0],
            ['1', 11],
            ['2', 22],
            ['33', 33],
            ['a3b5', 35],
            ['one2three4five', 15],
            ['jqbjxdkkveightrtktnsr92sevenmztdg', 87],
            ['eightone7threenl7mtxbmkpkzqzljrdk', 87],
            ['bfjtdslkdbthree4jvvonezqdthreesrghnnbsix', 36],
            ['8twothree8dzqbrvdx5', 85],
            ['5lglzqf2sgvshzjdmpzxldnkgzlrbvvmfsk', 52],
            ['cdfkddlnine34frsshqsevensevenfourqf', 94],
            ['7five6six814nineoneightqbb', 78],
        ];
    }
}
