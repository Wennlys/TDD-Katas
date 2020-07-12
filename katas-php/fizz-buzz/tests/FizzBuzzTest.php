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

        $this->assertContains("fizz", $result);

        if ($arrayLimit >= 5) {
            $this->assertContains("buzz", $result);
        }
    }

    public function testReplacingByDivisors()
    {
        $replaceIfIsDivisor = new ReplaceIfIsDivisor();
        $this->assertEquals("fizz", $replaceIfIsDivisor->replace(3));
        $this->assertEquals("buzz", $replaceIfIsDivisor->replace(5));
        $this->assertEquals("FizzBuzz", $replaceIfIsDivisor->replace(15));
        $this->assertEquals("fizz", $replaceIfIsDivisor->replace(27));
        $this->assertEquals(null, $replaceIfIsDivisor->replace(2));
    }

    public function testReplacingIfContains()
    {
        $replaceIfContains = new ReplaceIfContains();
        $this->assertEquals("fizz", $replaceIfContains->replace(3));
        $this->assertEquals("buzz", $replaceIfContains->replace(5));
        $this->assertEquals("buzz", $replaceIfContains->replace(15));
        $this->assertEquals("fizz", $replaceIfContains->replace(13));
        $this->assertEquals("buzz", $replaceIfContains->replace(6785));
        $this->assertEquals("fizz", $replaceIfContains->replace(864367));
        $this->assertEquals("FizzBuzz", $replaceIfContains->replace(35));
    }
}
