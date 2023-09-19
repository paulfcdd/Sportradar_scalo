<?php

namespace App;

class Game
{
    private Team $homeTeam;
    private Team $awayTeam;
    private int $homeScore;
    private int $awayScore;

    public function __construct(Team $homeTeam, Team $awayTeam) {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->homeScore = 0;
        $this->awayScore = 0;
    }

    public function getHomeTeam(): Team {
        return $this->homeTeam;
    }

    public function getAwayTeam(): Team {
        return $this->awayTeam;
    }

    public function getHomeScore(): int {
        return $this->homeScore;
    }

    public function getAwayScore(): int {
        return $this->awayScore;
    }

    public function setScores(int $homeScore, int $awayScore): void {
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
    }

    public function getTotalScore(): int {
        return $this->homeScore + $this->awayScore;
    }
}