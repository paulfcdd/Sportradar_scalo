<?php

namespace Test;

use App\Game;
use App\Team;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase {
    public function testMatchInitialization() {
        $teamA = new Team("Team A");
        $teamB = new Team("Team B");
        $match = new Game($teamA, $teamB);

        $this->assertEquals(0, $match->getHomeScore());
        $this->assertEquals(0, $match->getAwayScore());
        $this->assertEquals($teamA, $match->getHomeTeam());
        $this->assertEquals($teamB, $match->getAwayTeam());
    }

    public function testMatchScoreUpdate() {
        $teamA = new Team("Team A");
        $teamB = new Team("Team B");
        $match = new Game($teamA, $teamB);

        $match->setScores(2, 3);
        $this->assertEquals(2, $match->getHomeScore());
        $this->assertEquals(3, $match->getAwayScore());
        $this->assertEquals(5, $match->getTotalScore());
    }
}