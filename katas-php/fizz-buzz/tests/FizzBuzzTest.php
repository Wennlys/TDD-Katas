<?php

namespace FizzBuzz\Test;

use FizzBuzz\FizzBuzz;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Exception;

class FizzBuzzTest extends TestCase
{
    
    /** @test */
    public function throwAnExceptionWhenArrayLimitIsNegative()
    {
        $this->expectException(InvalidArgumentException::class);

        new FizzBuzz(-1);
    }

    /** @test */
    public function itShouldReturnAnArray()
    {
        $fizzBuzz = new FizzBuzz(3);

        $result = $fizzBuzz->getFizzBuzz();

        $this->assertIsArray($result);
    }

    /** @test */
    public function itShouldNotCountAfterDefinedMaxNumber()
    {
        $arrayLimit = 3;

        $fizzBuzz = new FizzBuzz($arrayLimit);

        $result = $fizzBuzz->getFizzBuzz();

        $this->assertEquals($arrayLimit, count($result));
    }

    /** @test */
    public function throwAnExceptionWhenFizzBuzzNotFound()
    {
        $this->expectException(Exception::class);

        $fizzBuzz = new FizzBuzz(1);

        $fizzBuzz->getFizzBuzz();
    }

    /** @test */
    public function itShouldReturnFizzBuzzArray()
    {
        $fizzBuzz = new FizzBuzz(3);

        $result = $fizzBuzz->getFizzBuzz();

        $this->assertContains("fizz", $result);
    }
}
