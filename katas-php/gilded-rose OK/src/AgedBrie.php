<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrie extends Item
{
    public function __construct($sell_in, $quality)
    {
        parent::__construct('Aged Brie', $sell_in, $quality);
    }

    public function updateQuality(): void
    {
        if ($this->quality < 50) {
            ++$this->quality;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }

        --$this->sell_in;
    }
}
