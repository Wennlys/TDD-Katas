<?php

namespace FizzBuzz;

class ReplaceIfIsDivisor implements Replacer
{
    public function replace(int $number): ?string
    {
        if ($number == 0) {
            return null;
        }

        $isNumDividedByThree = $number % 3 == 0;
        $isNumDividedByFive = $number % 5 == 0;

        if ($isNumDividedByThree && $isNumDividedByFive) {
            return "FizzBuzz";
        } elseif ($isNumDividedByThree) {
            return "Fizz";
        } elseif ($isNumDividedByFive) {
            return "Buzz";
        }

        return null;
    }
}
