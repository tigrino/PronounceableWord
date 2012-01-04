<?php
/*
 * This file is part of the PronounceableWord library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/Configuration/LinkedLetters.php';
require_once dirname(__FILE__) . '/Configuration/LetterTypes.php';
require_once dirname(__FILE__) . '/Configuration/Generator.php';
require_once dirname(__FILE__) . '/LinkedLetters.php';
require_once dirname(__FILE__) . '/LetterTypes.php';
require_once dirname(__FILE__) . '/LastLettersConsecutiveTypes.php';
require_once dirname(__FILE__) . '/Generator.php';

class PronounceableWord_DependencyInjectionContainer {
    public $configurations = array();

    public function  __construct() {
        $this->configurations['generator'] = new PronounceableWord_Configuration_Generator();
    }

    public function getGenerator() {
        $linkedLettersConfiguration = new PronounceableWord_Configuration_LinkedLetters();
        $letterTypesConfiguration = new PronounceableWord_Configuration_LetterTypes();
        $linkedLetters = new PronounceableWord_LinkedLetters($linkedLettersConfiguration);
        $letterTypes = new PronounceableWord_LetterTypes($letterTypesConfiguration);
        $lastLettersConsecutiveTypes = new PronounceableWord_LastLettersConsecutiveTypes($letterTypes);
        $generator = new PronounceableWord_Generator($linkedLetters, $letterTypes, $lastLettersConsecutiveTypes, $this->configurations['generator']);

        return $generator;
    }
}
