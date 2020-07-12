<?php

namespace FizzBuzz;

class ReplaceIfContains implements Replacer
{
    public function replace(int $number): ?string
    {
        $numberString = (string)$number;

        $hasThree = strpos($numberString, '3') !== false;
        $hasFive = strpos($numberString, '5') !== false;

        if ($hasThree && $hasFive) {
            return "FizzBuzz";
        } elseif ($hasThree) {
            return "fizz";
        } elseif ($hasFive) {
            return "buzz";
        }

        return null;
    }
}
