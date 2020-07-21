<?php

namespace Codium\TennisRefactoring;

class TennisGame
{
    private Player $player1;
    private Player $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function getScore()
    {
        foreach ($this->scores() as $score) {
            if ($score->isAppliable()) {
                return $score->__toString();
            }
        }
    }

    /**
     * @return Score[]
     */
    public function scores(): array
    {
        return [
            new TieScore($this->player1, $this->player2),
            new WinScore($this->player1, $this->player2),
            new AdvantageScore($this->player1, $this->player2),
            new NormalScore($this->player1, $this->player2),
        ];
    }
}
