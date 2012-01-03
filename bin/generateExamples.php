#!/usr/bin/env php

<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../src/PronounceableWord/Generator.php';

define('MINIMUM_LENGTH', 4);
define('MAXIMUM_LENGTH', 12);

$generator = new PronounceableWord_Generator();

$maximumGenerationNumber = 20;
for ($generationNumber = 0; $generationNumber < $maximumGenerationNumber; $generationNumber++) {
    $length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);

    echo $generator->generateWordOfGivenLength($length) . "\n";
}
