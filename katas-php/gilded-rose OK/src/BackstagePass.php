<?php

declare(strict_types=1);

namespace GildedRose;

class BackstagePass extends Item
{
    public function __construct($sell_in, $quality)
    {
        parent::__construct('Backstage passes to a TAFKAL80ETC concert', $sell_in, $quality);
    }

    public function updateQuality(): void
    {
        ++$this->quality;

        if ($this->sell_in < 11) {
            ++$this->quality;
        }

        if ($this->sell_in < 6) {
            ++$this->quality;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }

        if ($this->sell_in < 0) {
            $this->quality = 0;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }

        --$this->sell_in;
    }
}
