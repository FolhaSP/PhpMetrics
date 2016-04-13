<?php
namespace Test\Hal\Metrics\Complexity\Text\Halstead;

use Hal\Component\Token\Tokenizer;
use Hal\Metrics\Complexity\Component\McCabe\McCabe;
use Hal\Metrics\Complexity\Component\McCabe\Result;

/**
 * @group mccabe
 * @group metric
 */
class MacCaybe extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider provideCCN
     */
    public function testICanCountComplexity($filename, $expectedCCN) {

        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize(file_get_contents($filename));
        $loc = new McCabe();
        $r = $loc->calculate($tokens);
        $this->assertEquals($expectedCCN, $r->getCyclomaticComplexityNumber());
    }

    public function provideCCN() {
        return array(
            array(__DIR__.'/../../../../../resources/mccaybe/f1.php', 3)
            ,array(__DIR__.'/../../../../../resources/mccaybe/f2.php', 4)
            ,array(__DIR__.'/../../../../../resources/mccaybe/f3.php', 4)
            ,array(__DIR__.'/../../../../../resources/mccaybe/f4.php', 3)
        );
    }

    public function testMcCaybeResultCanBeConvertedToArray() {

        $result = new \Hal\Metrics\Complexity\Component\McCabe\Result();
        $array = $result->asArray();

        $this->assertArrayHasKey('cyclomaticComplexity', $array);
    }

    /**
     * @dataProvider provideCCNPHP7
     * @group php7
     */
    public function testICanCountComplexityOfAnonymousClass($filename, $expectedCCN) {

        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize(file_get_contents($filename));
        $loc = new McCabe();
        $r = $loc->calculate($tokens);
        $this->assertEquals($expectedCCN, $r->getCyclomaticComplexityNumber());
    }

    public function provideCCNPHP7() {
        return array(
            array(__DIR__.'/../../../../../resources/mccaybe/php7-1.php', 5)
        );
    }

    /**
     * @group php7
     */
    public function testNullCoalesceOperatorIsWellConsidered() {
        $filename = __DIR__.'/../../../../../resources/mccaybe/php7-null-coalesce-operator.php';
        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize(file_get_contents($filename));
        $loc = new McCabe();
        $r = $loc->calculate($tokens);
        $this->assertEquals(3, $r->getCyclomaticComplexityNumber());
    }

    /**
     * @group php7
     */
    public function testSpaceshipOperatorIsWellConsidered() {
        $filename = __DIR__.'/../../../../../resources/mccaybe/php7-spaceship-operator.php';
        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize(file_get_contents($filename));
        $loc = new McCabe();
        $r = $loc->calculate($tokens);
        $this->assertEquals(2, $r->getCyclomaticComplexityNumber());
    }
}
