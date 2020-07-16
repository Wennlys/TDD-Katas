<?php

namespace Codium\TennisRefactoring;

class TennisGame
{
    private $player1PointsWonOnGame = 0;
    private $player2PointsWonOnGame = 0;
    private $player1Name = '';
    private $player2Name = '';

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint(string $playerName)
    {
        if ($this->player1Name == $playerName) {
            $this->player1PointsWonOnGame++;
        } else {
            $this->player2PointsWonOnGame++;
        }
    }

    public function getScore()
    {
        if ($this->isTied()) {
            return $this->tiedScore();
        } elseif ($this->areFirstPoints()) {
            return $this->firstPointsScore();
        } elseif ($this->hasFinished()) {
            return $this->winnerScore();
        } else {
            return $this->lotsOfPointsScore();
        }
    }

    private function tiedScore(): string
    {
        $scores = ['Love-All', 'Fifteen-All', 'Thirty-All'];
        return $scores[$this->player1PointsWonOnGame] ?? 'Deuce';
    }

    private function firstPointsScore(): string
    {
        $scores = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        return $scores[$this->player1PointsWonOnGame] . "-" . $scores[$this->player2PointsWonOnGame];
    }

    private function winnerScore(): string
    {
        return "Win for " . $this->winningPlayer();
    }

    private function lotsOfPointsScore(): string
    {
        return "Advantage " . $this->winningPlayer();
    }

    private function hasFinished(): bool
    {
        return abs($this->player1PointsWonOnGame - $this->player2PointsWonOnGame) >= 2;
    }

    private function winningPlayer(): string
    {
        return $this->player1PointsWonOnGame > $this->player2PointsWonOnGame ? $this->player1Name : $this->player2Name;
    }

    private function isTied(): bool
    {
        return $this->player1PointsWonOnGame == $this->player2PointsWonOnGame;
    }

    private function areFirstPoints(): bool
    {
        return $this->player1PointsWonOnGame < 4 && $this->player2PointsWonOnGame < 4;
    }
}