<?php namespace Calculator\Tests;

use Calculator\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_evaluate_a_simple_infix_string()
    {
        $infix = '1 + 1 * 3 + 3';

        $calculator = new Calculator();
        $result = $calculator->evaluate($infix);

        $this->assertEquals(7, $result);
    }

    /** @test */
    public function it_should_evaluate_complex_infix_string()
    {
        $infix = '50 + 10 * 16 / 2 * 13 - 20 * 2 - 100 / 2';

        $calculator = new Calculator();
        $result = $calculator->evaluate($infix);

        $this->assertEquals(1000, $result);
    }

    /** @test */
    public function it_should_evaluate_float_numbers()
    {
        $infix = '50.5 + 10.4 * 16.7 / 2.3 * 13.8 - 20.4 * 2.1 - 100.9 / 2.05';

        $calculator = new Calculator();
        $result = $calculator->evaluate($infix);

        $this->assertEquals(1000.5204878048783, $result);
    }
}
