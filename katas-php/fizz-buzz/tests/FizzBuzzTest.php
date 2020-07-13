<?php

namespace FizzBuzz\Test;

use FizzBuzz\FizzBuzz;
use FizzBuzz\ReplaceIfIsDivisor;
use FizzBuzz\ReplaceIfContains;
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
        new FizzBuzz(0);
    }

    /** @test */
    public function itShouldReturnAnArray()
    {
        $fizzBuzz = new FizzBuzz(3);

        $result = $fizzBuzz->get();

        $this->assertIsArray($result);
    }

    /** @test */
    public function itShouldNotCountAfterDefinedMaxNumber()
    {
        $arrayLimit = 3;

        $fizzBuzz = new FizzBuzz($arrayLimit);

        $result = $fizzBuzz->get();

        $this->assertEquals($arrayLimit, count($result));
    }

    /** @test */
    public function throwAnExceptionWhenFizzBuzzNotFound()
    {
        $this->expectException(Exception::class);

        $fizzBuzz = new FizzBuzz(1);

        $fizzBuzz->get();
    }

    /** @test */
    public function itShouldReturnFizzBuzzArray()
    {
        $arrayLimit = 3;
        $fizzBuzz = new FizzBuzz($arrayLimit);
        $result = $fizzBuzz->get();

        $this->assertContains("Fizz", $result);

        if ($arrayLimit >= 5) {
            $this->assertContains("Buzz", $result);
        }
    }

    public function testReplacingByDivisors()
    {
        $replaceIfIsDivisor = new ReplaceIfIsDivisor();
        $this->assertEquals("Fizz", $replaceIfIsDivisor->replace(3));
        $this->assertEquals("Buzz", $replaceIfIsDivisor->replace(5));
        $this->assertEquals("FizzBuzz", $replaceIfIsDivisor->replace(15));
        $this->assertEquals("Fizz", $replaceIfIsDivisor->replace(27));
        $this->assertEquals(null, $replaceIfIsDivisor->replace(2));
    }

    public function testReplacingIfContains()
    {
        $replaceIfContains = new ReplaceIfContains();
        $this->assertEquals("Fizz", $replaceIfContains->replace(3));
        $this->assertEquals("Buzz", $replaceIfContains->replace(5));
        $this->assertEquals("Buzz", $replaceIfContains->replace(15));
        $this->assertEquals("Fizz", $replaceIfContains->replace(13));
        $this->assertEquals("Buzz", $replaceIfContains->replace(6785));
        $this->assertEquals("Fizz", $replaceIfContains->replace(864367));
        $this->assertEquals("FizzBuzz", $replaceIfContains->replace(35));
        $this->assertEquals(null, $replaceIfContains->replace(7));
    }

    public function testAllReplacements()
    {
        $this->assertEquals(
            [1, 2, "Fizz", 4, "Buzz", "Fizz", 7, 8, "Fizz", "Buzz", 11, "Fizz", "Fizz", 14, "FizzBuzz", 16, 17, "Fizz", 19, "Buzz", "Fizz", 22, "Fizz", "Fizz", "Buzz"],
            (new FizzBuzz(25))->get()
        );
    }
}
