<?php namespace Calculator;

/**
 * Class InfixParser
 *
 * Parse a mathematical expression specified in infix notation.
 * Convert the expression to Reverse Polish Notation (RPN)
 * using the Shunting-yard algorithm:
 * http://en.wikipedia.org/wiki/Shunting-yard_algorithm
 */
class InfixParser
{
    protected $regex = '(([0-9]*\.[0-9]+|[0-9]+|\+|-|\*|/)|\s+)';
    protected $tokens;
    protected $operators = [
        '+' => ['precedence' => 0],
        '-' => ['precedence' => 0],
        '*' => ['precedence' => 1],
        '/' => ['precedence' => 1],
    ];

    function __construct($infixString)
    {
        $this->tokens = preg_split($this->regex, $infixString, null, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $this->tokens = array_map('trim', $this->tokens);
    }


    public function getInfixTokens()
    {
        return $this->tokens;
    }

    public function getRPNTokens()
    {
        $stack  = new \SplStack();
        $output = new \SplQueue();

        foreach ($this->tokens as $token) {
            if (is_numeric($token)) {
                $output->enqueue($token);
            } elseif (isset($this->operators[$token])) {
                while ($this->isTopAnOperator($stack) && $this->hasLowerPrecedence($token, $stack->top())) {
                    $output->enqueue($stack->pop());
                }
                $stack->push($token);
            } else {
                throw new \InvalidArgumentException('Invalid token: ' . $token);
            }
        }

        while ($this->isTopAnOperator($stack)) {
            $output->enqueue($stack->pop());
        }

        if (count($stack) > 0) {
            throw new \InvalidArgumentException('Misplaced number in input: ' . json_encode($this->tokens));
        }

        return iterator_to_array($output);
    }

    function isTopAnOperator(\SplStack $stack)
    {
        if (count($stack) == 0) {
            return false;
        }

        $top = $stack->top();

        if (!isset($this->operators[$top])) {
            return false;
        }

        return true;
    }

    function hasLowerPrecedence($o1, $o2)
    {
        return $this->operators[$o1]['precedence'] <= $this->operators[$o2]['precedence'];
    }
}
