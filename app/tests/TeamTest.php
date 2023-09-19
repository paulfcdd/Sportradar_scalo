<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Team;

class TeamTest extends TestCase {
    public function testTeamName() {
        $teamName = "Team A";
        $team = new Team($teamName);
        $this->assertEquals($teamName, $team->getName());
    }
}