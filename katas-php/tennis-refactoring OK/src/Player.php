<?php

namespace Codium\TennisRefactoring;

class Player
{
    private string $name;
    private int $score;

    public function __construct(string $name, int $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isInTieWith(Player $otherPlayer): bool
    {
        return $this->score === $otherPlayer->getScore();
    }

    public function hasWonAgainst(Player $otherPlayer): bool
    {
        $advantageOverPlayer = $this->score - $otherPlayer->getScore();

        return $this->score >= 4 && $advantageOverPlayer >= 2;
    }

    public function hasAdvantageOver(Player $otherPlayer): bool
    {
        $advantageOverPlayer = $this->score - $otherPlayer->getScore();

        return $this->score >= 4 && 1 === $advantageOverPlayer;
    }
}
