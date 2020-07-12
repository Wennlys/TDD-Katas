<?php

namespace FizzBuzz;

class ReplaceIfIsDivisor implements Replacer
{
    public function replace(int $number): ?string
    {
        $isNumDividedByThree = $number % 3 == 0;
        $isNumDividedByFive = $number % 5 == 0;

        if ($isNumDividedByThree && $isNumDividedByFive) {
            return "FizzBuzz";
        } elseif ($isNumDividedByThree) {
            return "fizz";
        } elseif ($isNumDividedByFive) {
            return "buzz";
        }
        return null;
    }
}
