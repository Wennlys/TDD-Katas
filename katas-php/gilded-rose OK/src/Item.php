<?php

namespace GildedRose;

class Item
{
    public $name;
    public $sell_in;
    public $quality;

    public function __construct($name, $sell_in, $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function updateQuality(): void
    {
        if ($this->sell_in < 0) {
            $this->quality -= 2;
        } else {
            --$this->quality;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }

        --$this->sell_in;
    }
}
