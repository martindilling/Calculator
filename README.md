# Calculator

Parse and calculate a mathematical expression in infix notation.

## Example

Run the example with:

```php
$infix = '1 + 1 * 3 + 3';

$calculator = new \Calculator\Calculator();
$result = $calculator->evaluate($infix);

echo $result; // 7
```

## Tests

Unit tests is found in the `tests` folder.
Run the tests with:

````
phpunit
````
