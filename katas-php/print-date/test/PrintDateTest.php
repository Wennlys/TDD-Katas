<?php

namespace PrintDate\Test;

use PrintDate\PrintDate;
use PHPUnit\Framework\TestCase;

class PrintDateTest extends TestCase
{
    /** @test */
    public function itTestSystemMethods()
    {
        $printDate = new PrintDate();

        $printDate->printCurrentDate();

        // I don't know how to test it
    }
}
