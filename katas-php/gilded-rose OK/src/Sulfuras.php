<?php

declare(strict_types=1);

namespace GildedRose;

class Sulfuras extends Item
{
    public function __construct($sell_in, $quality)
    {
        parent::__construct('Sulfuras, Hand of Ragnaros', $sell_in, $quality);
    }

    public function updateQuality(): void
    {
    }
}
