<?php
/*
 * This file is part of the EnunciableWordGenerator library.
 *
 * (c) Loic Chardonnet
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/../lib/LetterTypes.php';

class LetterTypesTest extends PHPUnit_Framework_TestCase {
    public function testGetLetterType() {
        $configuration = new LetterTypesConfiguration();
        $letterTypes = new LetterTypes();

        foreach ($configuration->letterTypesWithLetters as $letterType => $letters) {
            $maximumLetterIndex = strlen($letters);
            for ($letterIndex = 0; $letterIndex < $maximumLetterIndex; $letterIndex++) {
                $letter = $letters[$letterIndex];

                $this->assertSame($letterType, $letterTypes->getLetterType($letter));
            }
        }
    }
}
