<?php namespace Calculator;

class RPNCalculator
{
    /**
     * Evaluate the expression given as an array of tokens.
     * The tokens must be in reverse polish notation.
     *
     * @param array $tokens
     * @return float
     */
    public function evaluate(array $tokens)
    {
        $stack = new \SplStack();

        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                $stack->push((float) $token);
                continue;
            }

            $num2 = $stack->pop();
            $num1 = $stack->pop();

            switch ($token) {
                case '+':
                    $stack->push($num1 + $num2);
                    break;
                case '-':
                    $stack->push($num1 - $num2);
                    break;
                case '*':
                    $stack->push($num1 * $num2);
                    break;
                case '/':
                    $stack->push($num1 / $num2);
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid operation: ' . $token);
                    break;
            }
        }

        return $stack->top();
    }
}
