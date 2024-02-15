<?php

namespace Tests\Challenges\Decrypt;

use App\Challenges\Decrypt\DecryptResolver;
use App\Challenges\Decrypt\Enums\NumberEnum;
use App\Challenges\Decrypt\Filters\NumberFilter;
use App\Challenges\Decrypt\Filters\ParseNumberFilter;
use App\Challenges\Decrypt\InputCode;
use PHPUnit\Framework\TestCase;

class DecryptResolverTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @testdox should return $expectation
     */
    public function testExecute($codes, $expectation)
    {
        $inputs = array_map(
            fn (string $code) => new InputCode($code, new NumberFilter(), new ParseNumberFilter(NumberEnum::cases())),
            $codes
        );

        $resolver = new DecryptResolver(...$inputs);

        $this->assertEquals($expectation, $resolver->execute());
    }

    public function dataProvider(): array
    {
        return [
            [['', '1', '22'], 33],
            [['one2three4five', 'jqbjxdkkveightrtktnsr92sevenmztdg'], 102]
        ];
    }
}
