<?php

namespace FizzBuzz;

interface Replacer
{
    public function replace(int $number): ?string;
}
