<?php

declare(strict_types=1);

namespace GildedRose;

class GildedRose
{
    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function udpateQuality()
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case "Aged Brie":
                    $item->sell_in -= 1;
                    $this->agedBrie($item);
                    return;
                case "Backstage passes to a TAFKAL80ETC concert":
                    $this->backstage($item);
                    $item->sell_in -= 1;
                    return;
                case "Conjured":
                    $this->conjured($item);
                    $item->sell_in -= 1;
                    return;
                case "Sulfuras, Hand of Ragnaros":
                    return;
                default:
                    $item->sell_in -= 1;
                    $this->default($item);
            }

            if ($item->quality < 0) {
                $item->quality = 0;
            }
        }
    }

    private function agedBrie($item)
    {
        if ($item->quality < 50) {
            $item->quality += 1;
        }
    }

    private function default($item)
    {
        if ($item->sell_in < 0) {
            $item->quality -= 2;
        } else {
            $item->quality -= 1;
        }
    }

    private function backstage($item)
    {
        $item->quality += 1;

        if ($item->sell_in < 11) {
            $item->quality += 1;
        }

        if ($item->sell_in < 6) {
            $item->quality += 1;
        }

        if ($item->sell_in < 0) {
            $item->quality = 0;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

    private function conjured($item)
    {
            $item->quality -= 2;
    }
}
