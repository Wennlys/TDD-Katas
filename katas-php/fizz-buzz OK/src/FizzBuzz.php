<?php

namespace FizzBuzz;

use InvalidArgumentException;
use Exception;
use FizzBuzz\ReplaceIfIsDivisor;
use FizzBuzz\ReplaceIfContains;

class FizzBuzz
{
    private int $arrayLimit;

    public function __construct(int $arrayLimit)
    {
        if ($arrayLimit <= 0) {
            throw new InvalidArgumentException("arrayLimit must not be negative");
        }

        $this->arrayLimit = $arrayLimit;
    }

    public function get(): array
    {
        $numbersList = $this->createArrayWithDefinedValue();
        $replacedArray = $this->replace($numbersList, new ReplaceIfIsDivisor());
        $replacedArray = $this->replace($replacedArray, new ReplaceIfContains());

        $this->validate($replacedArray);

        return $replacedArray;
    }

    private function replace(array $numbers, Replacer $requirement): array
    {
        foreach ($numbers as $number) {
            if (gettype($number) == 'string') {
                $replacedArray[] = $number;
            } else {
                $replacedArray[] = $requirement->replace($number) ?? $number;
            }
        }
        return $replacedArray ?? [];
    }

    /** @throws Exception */
    private function validate(array $replacedArray): void
    {
        if (
            in_array("Fizz", $replacedArray, true) == false &&
            in_array("Buzz", $replacedArray, true) == false
        ) {
            throw new Exception('Not Found');
        }
    }

    private function createArrayWithDefinedValue(): array
    {
        for ($i = 1; $i <= $this->arrayLimit; $i++) {
            $array[] = $i;
        }
        return $array;
    }
}
