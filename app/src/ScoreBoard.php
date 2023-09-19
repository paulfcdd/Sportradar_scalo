<?php

namespace App;

class ScoreBoard {
    private array $ongoingMatches = [];

    public function startMatch(Team $homeTeam, Team $awayTeam): Game {
        $match = new Game($homeTeam, $awayTeam);
        array_unshift($this->ongoingMatches, $match);  // Most recently added matches are in the beginning
        return $match;
    }

    public function finishMatch(Game $match): void {
        $index = array_search($match, $this->ongoingMatches, true);
        if ($index !== false) {
            unset($this->ongoingMatches[$index]);
        }
    }

    public function updateScore(Game $match, int $homeScore, int $awayScore): void {
        $match->setScores($homeScore, $awayScore);
    }

    public function getSummary(): array {
        // Sort by total score and then by order added
        usort($this->ongoingMatches, function(Game $a, Game $b) {
            if ($a->getTotalScore() === $b->getTotalScore()) {
                return 0;
            }
            return ($a->getTotalScore() > $b->getTotalScore()) ? -1 : 1;
        });

        return $this->ongoingMatches;
    }
}