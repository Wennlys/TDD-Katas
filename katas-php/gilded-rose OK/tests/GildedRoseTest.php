<?php

namespace GildedRose\Tests;

use GildedRose\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /** @test */
    public function qualityShouldDecreaseTwiceAsFast()
    {
        $items = [GildedRose::createItem('aName', -1, 20)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(18, $items[0]->quality);
    }

    /** @test */
    public function qualityShouldNotBeNegative()
    {
        $items = [GildedRose::createItem('bName', 1, 0)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();
        $this->assertNotSame(-1, $items[0]->quality);

        $gildedRose->updateQuality();
        $this->assertNotSame(-2, $items[0]->quality);
    }

    /** @test */
    public function agedBrieItemShouldIncreasesInQualityWhenOlder()
    {
        $items = [GildedRose::createItem('Aged Brie', 1, 1)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(2, $items[0]->quality);
    }

    /** @test */
    public function qualityShouldNotBeOver50()
    {
        $items = [
            GildedRose::createItem('Aged Brie', 20, 50),
            GildedRose::createItem('Backstage passes to a TAFKAL80ETC concert', 10, 50),
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertNotSame(51, $items[0]->quality);
        $this->assertNotSame(52, $items[1]->quality);
    }

    /** @test */
    public function legendaryItemsShouldNotChange()
    {
        $items = [GildedRose::createItem('Sulfuras, Hand of Ragnaros', 0, 80)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(80, $items[0]->quality);
    }

    /** @test */
    public function backstageIncreasesQualityWhenSellInApproachsToSpeficiedNumber()
    {
        $items = [
            GildedRose::createItem('Backstage passes to a TAFKAL80ETC concert', 10, 30),
            GildedRose::createItem('Backstage passes to a TAFKAL80ETC concert', 5, 30),
            GildedRose::createItem('Backstage passes to a TAFKAL80ETC concert', -1, 50),
            GildedRose::createItem('Backstage passes to a TAFKAL80ETC concert', 5, 50),
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(32, $items[0]->quality);
        $this->assertSame(33, $items[1]->quality);
        $this->assertSame(0, $items[2]->quality);
        $this->assertSame(50, $items[3]->quality);
    }

    /** @test */
    public function conjuredItemsDegradeInQualityTwiceAsFast()
    {
        $items = [GildedRose::createItem('Conjured', 10, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(28, $items[0]->quality);
    }
}
