<?php

declare(strict_types=1);

namespace GildedRose;

class GildedRose
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $item->updateQuality();
        }
    }

    public static function createItem(string $name, int $sell_in, int $quality): Item
    {
        switch ($name) {
            case 'Aged Brie':
                return new AgedBrie($sell_in, $quality);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePass($sell_in, $quality);
            case 'Sulfuras, Hand of Ragnaros':
                return new Sulfuras($sell_in, $quality);
            case 'Conjured':
                return new Conjured($sell_in, $quality);
            default:
                return new Item($name, $sell_in, $quality);
        }
    }
}
