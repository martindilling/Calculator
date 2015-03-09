<?php namespace Calculator\Tests;

use Calculator\RPNCalculator;

class RPNCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_()
    {
        $rpnCalculator = new RPNCalculator();

        $result = $rpnCalculator->evaluate(['1', '1', '3', '*', '+', '3', '+']);

        $this->assertEquals(7, $result);
    }
}
