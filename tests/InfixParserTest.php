<?php namespace Calculator\Tests;

use Calculator\InfixParser;

class InfixParserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_parse_plus_sign()
    {
        $parser = new InfixParser('1 + 1');

        $tokens = $parser->getInfixTokens();

        $this->assertEquals(['1', '+', '1'], $tokens);
    }

    /** @test */
    public function it_should_parse_minus_sign()
    {
        $parser = new InfixParser('1 - 1');

        $tokens = $parser->getInfixTokens();

        $this->assertEquals(['1', '-', '1'], $tokens);
    }

    /** @test */
    public function it_should_parse_multiply_sign()
    {
        $parser = new InfixParser('1 * 1');

        $tokens = $parser->getInfixTokens();

        $this->assertEquals(['1', '*', '1'], $tokens);
    }

    /** @test */
    public function it_should_parse_divide_sign()
    {
        $parser = new InfixParser('1 / 1');

        $tokens = $parser->getInfixTokens();

        $this->assertEquals(['1', '/', '1'], $tokens);
    }

    /** @test */
    public function it_should_parse_infix_to_array_of_tokens()
    {
        $parser = new InfixParser('1 + 2 - 3 * 4 / 5');

        $tokens = $parser->getInfixTokens();

        $this->assertEquals(['1', '+', '2', '-', '3', '*', '4', '/', '5'], $tokens);
    }

    /** @test */
    public function it_should_convert_to_reverse_polish_notation()
    {
        $parser = new InfixParser('1 + 1 * 3 + 3');

        $tokens = $parser->getRPNTokens();

        $this->assertEquals(['1', '1', '3', '*', '+', '3', '+'], $tokens);
    }
}
