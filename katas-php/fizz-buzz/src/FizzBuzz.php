<?php

namespace FizzBuzz;

use InvalidArgumentException;
use Exception;

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

    public function getFizzBuzz(): array
    {
        $notReplacedNums = $this->createArrayWithDefinedValue();
        $fizzBuzzArray = $this->fizzBuzzReplacer($notReplacedNums);
        $this->validateFizzBuzz($fizzBuzzArray);

        return $fizzBuzzArray;
    }

    private function validateFizzBuzz(array $fizzBuzzArray)
    {
        if (
            in_array('fizz', $fizzBuzzArray, true) == false &&
            in_array('buzz', $fizzBuzzArray, true) == false
        ) {
            throw new Exception('Not Found');
        }
    }

    private function fizzBuzzReplacer(array $notReplacedNums): array
    {
        $replacedNums = [];

        for ($i = 0; $i < count($notReplacedNums); $i++) {
            if ($notReplacedNums[$i] % 3 == 0) {
                $replacedNums[$i] = "fizz";
            } elseif ($notReplacedNums[$i] % 5 == 0) {
                $replacedNums[$i] = "buzz";
            } else {
                $replacedNums[$i] = $i;
            }
        }
        return $replacedNums;
    }

    private function createArrayWithDefinedValue(): array
    {
        for ($i = 0, $numbersList = []; $i < $this->arrayLimit; $i++) {
            $numbersList[$i] = $i + 1;
        }

        return $numbersList;
    }
}
