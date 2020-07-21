<?php

namespace FizzBuzz;

class ReplaceIfIsDivisor implements Replacer
{
    public function replace(int $number): ?string
    {
        if (0 === $number) {
            return null;
        }

        $isNumDividedByThree = 0 === $number % 3;
        $isNumDividedByFive = 0 === $number % 5;

        if ($isNumDividedByThree && $isNumDividedByFive) {
            return 'FizzBuzz';
        }
        if ($isNumDividedByThree) {
            return 'Fizz';
        }
        if ($isNumDividedByFive) {
            return 'Buzz';
        }

        return null;
    }
}
