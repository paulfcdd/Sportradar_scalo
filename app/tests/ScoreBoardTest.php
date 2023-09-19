<?php

use App\ScoreBoard;
use App\Team;
use PHPUnit\Framework\TestCase;

class ScoreBoardTest extends TestCase {
    private ScoreBoard $scoreBoard;

    protected function setUp(): void {
        $this->scoreBoard = new ScoreBoard();
    }

    public function testStartAndFinishMatch() {
        $teamA = new Team("Team A");
        $teamB = new Team("Team B");
        $match = $this->scoreBoard->startMatch($teamA, $teamB);

        $this->assertCount(1, $this->scoreBoard->getSummary());

        $this->scoreBoard->finishMatch($match);
        $this->assertCount(0, $this->scoreBoard->getSummary());
    }

    public function testUpdateScore() {
        $teamA = new Team("Team A");
        $teamB = new Team("Team B");
        $match = $this->scoreBoard->startMatch($teamA, $teamB);

        $this->scoreBoard->updateScore($match, 2, 1);
        $this->assertEquals(2, $match->getHomeScore());
        $this->assertEquals(1, $match->getAwayScore());
    }

    public function testMatchSummaryOrder() {
        $teamA = new Team("Team A");
        $teamB = new Team("Team B");
        $teamC = new Team("Team C");
        $teamD = new Team("Team D");

        $match1 = $this->scoreBoard->startMatch($teamA, $teamB);
        $match2 = $this->scoreBoard->startMatch($teamC, $teamD);

        $this->scoreBoard->updateScore($match1, 2, 1); // Total 3
        $this->scoreBoard->updateScore($match2, 1, 1); // Total 2

        $summary = $this->scoreBoard->getSummary();
        $this->assertEquals($match1, $summary[0]);
        $this->assertEquals($match2, $summary[1]);
    }
}
