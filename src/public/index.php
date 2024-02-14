<?php

namespace App;

use App\Challenges\Decrypt\DecryptResolver;
use App\Challenges\Decrypt\InputCode;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$inputData = json_decode(file_get_contents('src/public/data/decrypt_challenge.json'), true);

$inputCodes = array_map(fn (string $code) => new InputCode($code), $inputData);

$decryptResolver = new DecryptResolver(...$inputCodes);

$result = $decryptResolver->execute();

echo "Code challenge result: $result" . PHP_EOL;
