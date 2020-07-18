<?php

namespace GildedRose\Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /** @test */
    public function qualityShouldDecreaseTwiceAsFast()
    {
        $items = [new Item("aName", -1, 20)];
        $gildedRose = new GildedRose($items);

        $gildedRose->udpateQuality();

        $this->assertEquals(18, $items[0]->quality);
    }

    /** @test */
    public function qualityShouldNotBeNegative()
    {
        $items = [new Item("bName", 1, 0)];
        $gildedRose = new GildedRose($items);

        $gildedRose->udpateQuality();
        $this->assertNotEquals(-1, $items[0]->quality);

        $gildedRose->udpateQuality();
        $this->assertNotEquals(-2, $items[0]->quality);
    }

    /** @test */
    public function agedBrieItemShouldIncreasesInQualityWhenOlder()
    {
        $items = [new Item("Aged Brie", 1, 1)];
        $gildedRose = new GildedRose($items);

        $gildedRose->udpateQuality();

        $this->assertEquals(2, $items[0]->quality);
    }

    /** @test */
    public function qualityShouldNotBeOver50()
    {
        $items = [
            new Item("Aged Brie", 20, 50),
            new Item("Backstage passes to a TAFKAL80ETC concert", 10, 50)
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->udpateQuality();
        $this->assertNotEquals(51, $items[0]->quality);
        $this->assertNotEquals(52, $items[1]->quality);
    }

    /** @test */
    public function legendaryItemsShouldNotChange()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 0, 80)];
        $gildedRose = new GildedRose($items);

        $gildedRose->udpateQuality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(80, $items[0]->quality);
    }

    /** @test */
    public function backstageIncreasesQualityWhenSellInApproachsToSpeficiedNumber()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->udpateQuality();
        $this->assertEquals(32, $items[0]->quality);

        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->udpateQuality();
        $this->assertEquals(33, $items[0]->quality);

        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", -1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->udpateQuality();
        $this->assertEquals(0, $items[0]->quality);
    }

    /** @test */
    public function conjuredItemsDegradeInQualityTwiceAsFast()
    {
        $items = [new Item("Conjured", 10, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->udpateQuality();
        $this->assertEquals(28, $items[0]->quality);
    }
}
