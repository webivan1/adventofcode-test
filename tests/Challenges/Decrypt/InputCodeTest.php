<?php

namespace Tests\Challenges\Decrypt;

use App\Challenges\Decrypt\Enums\NumberEnum;
use App\Challenges\Decrypt\Filters\NumberFilter;
use App\Challenges\Decrypt\Filters\ParseNumberFilter;
use App\Challenges\Decrypt\InputCode;
use PHPUnit\Framework\TestCase;

class InputCodeTest extends TestCase
{
    /**
     * @dataProvider dataProviderForFirstPart
     * @testdox should find number $expectation when code is $code
     */
    public function testFirstPart($code, $expectation)
    {
        $inputCode = new InputCode($code, new NumberFilter());

        $this->assertEquals($expectation, $inputCode->findNumber());
    }

    /**
     * @dataProvider dataProviderForSecondPart
     * @testdox should find number $expectation when code is $code
     */
    public function testSecondPart($code, $expectation)
    {
        $inputCode = new InputCode($code, new NumberFilter(), new ParseNumberFilter(NumberEnum::cases()));

        $this->assertEquals($expectation, $inputCode->findNumber());
    }

    public function dataProviderForFirstPart(): array
    {
        return [
            ['', 0],
            ['1', 11],
            ['2', 22],
            ['33', 33],
            ['a3b5', 35],
            ['one2three4five', 24],
            ['jqbjxdkkveightrtktnsr92sevenmztdg', 92],
            ['eightone7threenl7mtxbmkpkzqzljrdk', 77],
            ['bfjtdslkdbthree4jvvonezqdthreesrghnnbsix', 44],
            ['8twothree8dzqbrvdx5', 85],
            ['5lglzqf2sgvshzjdmpzxldnkgzlrbvvmfsk', 52],
            ['cdfkddlnine34frsshqsevensevenfourqf', 34],
            ['7five6six814nineoneightqbb', 74],
        ];
    }

    public function dataProviderForSecondPart(): array
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
