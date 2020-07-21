<?php

namespace FizzBuzz;

class ReplaceIfContains implements Replacer
{
    public function replace(int $number): ?string
    {
        $numberString = (string) $number;

        $hasThree = false !== strpos($numberString, '3');
        $hasFive = false !== strpos($numberString, '5');

        if ($hasThree && $hasFive) {
            return 'FizzBuzz';
        }
        if ($hasThree) {
            return 'Fizz';
        }
        if ($hasFive) {
            return 'Buzz';
        }

        return null;
    }
}
