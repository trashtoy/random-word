<?php

use Word\Generator;

$loader = require(__DIR__ . "/vendor/autoload.php" );
$loader->add("Word", __DIR__);

$gen = new Generator();
echo $gen->generate(), PHP_EOL;
