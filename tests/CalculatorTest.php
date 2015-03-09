<?php namespace Calculator\Tests;

use Calculator\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_evaluate_infix_string()
    {
        $infix = '1 + 1 * 3 + 3';

        $calculator = new Calculator();
        $result = $calculator->evaluate($infix);

        $this->assertEquals(7, $result);
    }
}
