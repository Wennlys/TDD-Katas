<?php

namespace Codium\TennisRefactoring;

class AdvantageScore extends Score
{
    public function __construct(Player $player1, Player $player2)
    {
        parent::__construct($player1, $player2);
    }

    public function __toString(): string
    {
        return 'Advantage ' . $this->aheadPlayer()->getName();
    }

    public function isAppliable(): bool
    {
        return $this->player1->hasAdvantageOver($this->player2) || $this->player2->hasAdvantageOver($this->player1);
    }

    public function aheadPlayer(): Player
    {
        return $this->player1->getScore() > $this->player2->getScore() ? $this->player1 : $this->player2;
    }
}
