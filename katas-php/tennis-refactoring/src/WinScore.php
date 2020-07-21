<?php

namespace Codium\TennisRefactoring;

class WinScore extends Score
{
    public function __construct(Player $player1, Player $player2)
    {
        parent::__construct($player1, $player2);
    }

    public function __toString(): string
    {
        return 'Win for ' . $this->winnerPlayer()->getName();
    }

    public function isAppliable(): bool
    {
        return $this->player1->hasWonAgainst($this->player2) || $this->player2->hasWonAgainst($this->player1);
    }

    private function winnerPlayer(): Player
    {
        return $this->player1->hasWonAgainst($this->player2) ? $this->player1 : $this->player2;
    }
}
