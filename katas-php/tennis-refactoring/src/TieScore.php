<?php

namespace Codium\TennisRefactoring;

class TieScore extends Score
{
    public function __construct(Player $player1, Player $player2)
    {
        parent::__construct($player1, $player2);
    }

    public function __toString(): string
    {
        return $this->player1->getScore() > 2 ? 'Deuce' : $this->nameFor($this->player1->getScore()) . '-All';
    }

    public function isAppliable(): bool
    {
        return $this->player1->isInTieWith($this->player2);
    }

    private function nameFor(int $score): string
    {
        $scoreNames = ['Love', 'Fifteen', 'Thirty', 'Forty'];

        return $scoreNames[$score];
    }
}
