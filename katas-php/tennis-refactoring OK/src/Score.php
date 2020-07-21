<?php

namespace Codium\TennisRefactoring;

abstract class Score
{
    protected Player $player1;
    protected Player $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    abstract public function __toString(): string;

    abstract public function isAppliable(): bool;
}
