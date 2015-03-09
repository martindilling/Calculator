<?php namespace Calculator;

class Calculator
{
    public function evaluate($infix)
    {
        $parser = new InfixParser($infix);
        $rpnTokens = $parser->getRPNTokens();
        $rpnCalculator = new RPNCalculator();
        $result = $rpnCalculator->evaluate($rpnTokens);

        return $result;
    }
}
