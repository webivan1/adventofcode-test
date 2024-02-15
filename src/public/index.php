<?php

namespace App;

use App\Challenges\Decrypt\DecryptResolver;
use App\Challenges\Decrypt\Enums\NumberEnum;
use App\Challenges\Decrypt\Filters\NumberFilter;
use App\Challenges\Decrypt\Filters\ParseNumberFilter;
use App\Challenges\Decrypt\InputCode;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$inputData = json_decode(file_get_contents('src/public/data/decrypt_challenge.json'), true);

$inputCodes = array_map(fn (string $code) => new InputCode($code, new NumberFilter()), $inputData);
$decryptResolver = new DecryptResolver(...$inputCodes);
$firstPartResult = $decryptResolver->execute();
echo "First part result: $firstPartResult" . PHP_EOL;

$inputCodes = array_map(
    fn (string $code) => new InputCode($code, new NumberFilter(), new ParseNumberFilter(NumberEnum::cases())),
    $inputData
);
$decryptResolver = new DecryptResolver(...$inputCodes);
$secondPartResult = $decryptResolver->execute();
echo "Second part result: $secondPartResult" . PHP_EOL;
