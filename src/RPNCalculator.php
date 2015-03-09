<?php namespace Calculator;

class RPNCalculator
{
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
