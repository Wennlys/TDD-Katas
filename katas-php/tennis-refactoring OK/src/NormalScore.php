<?php

namespace Codium\TennisRefactoring;

class NormalScore extends Score
{
    public function __construct(Player $player1, Player $player2)
    {
        parent::__construct($player1, $player2);
    }

    public function __toString(): string
    {
        return $this->nameFor($this->player1->getScore()) . '-' . $this->nameFor($this->player2->getScore());
    }

    public function isAppliable(): bool
    {
        return $this->player1->getScore() <= 3 && $this->player2->getScore() <= 3;
    }

    private function nameFor(int $score): string
    {
        $scoreNames = ['Love', 'Fifteen', 'Thirty', 'Forty'];

        return $scoreNames[$score];
    }
}
