<?php namespace Calculator;

class Calculator
{
    /**
     * Evaluate a mathematical expression in infix notation.
     *
     * @param string $infix
     * @return float
     */
    public function evaluate($infix)
    {
        $parser = new InfixParser($infix);
        $rpnTokens = $parser->getRPNTokens();
        $rpnCalculator = new RPNCalculator();
        $result = $rpnCalculator->evaluate($rpnTokens);

        return $result;
    }
}
