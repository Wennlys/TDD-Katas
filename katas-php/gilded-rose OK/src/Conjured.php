<?php

declare(strict_types=1);

namespace GildedRose;

class Conjured extends Item
{
    public function __construct($sell_in, $quality)
    {
        parent::__construct('Conjured', $sell_in, $quality);
    }

    public function updateQuality(): void
    {
        $this->quality -= 2;

        if ($this->quality < 0) {
            $this->quality = 0;
        }

        --$this->sell_in;
    }
}
