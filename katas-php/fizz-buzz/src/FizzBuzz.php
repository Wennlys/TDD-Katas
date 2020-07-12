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
        if ($arrayLimit < 0) {
            throw new InvalidArgumentException("arrayLimit must not be negative");
        }

        $this->arrayLimit = $arrayLimit;
    }

    public function get(): array
    {
        $numbersList = $this->createArrayWithDefinedValue();
        $replacedArray = $this->replace($numbersList, new ReplaceIfIsDivisor());

        $this->validate($replacedArray);

        return $replacedArray;
    }

    private function replace(array $numbers, Replacer $requirement): array
    {
        foreach ($numbers as $number => $key) {
            $replacedArray[$key] = $requirement->replace($number) ?? $number;
        }
        return $replacedArray ?? [];
    }

    /** @throws Exception */
    private function validate(array $replacedArray): void
    {
        if (
            in_array('fizz', $replacedArray, true) == false &&
            in_array('buzz', $replacedArray, true) == false
        ) {
            throw new Exception('Not Found');
        }
    }

    private function createArrayWithDefinedValue(): array
    {
        for ($i = 1, $numbersList = []; $i <= $this->arrayLimit; $i++) {
            $numbersList[$i] = $i + 1;
        }
        return $numbersList;
    }
}
