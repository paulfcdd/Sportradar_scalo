<?php

require_once '../vendor/autoload.php';

use App\Team;
use App\ScoreBoard;

$scoreboard = new ScoreBoard();

$brazil = new Team("Brazil");
$spain = new Team("Spain");
$ukraine = new Team('Ukraine');
$poland = new Team('Poland');

$match = $scoreboard->startMatch($brazil, $spain);
$match2 = $scoreboard->startMatch($ukraine, $poland);

$scoreboard->updateScore($match, 2, 3);
$scoreboard->updateScore($match2, 1, 1);

// Display teams and their scores
echo "Football World Cup Score Board: <br>" . PHP_EOL;
echo "-------------------------------- <br>" . PHP_EOL;
$matches = $scoreboard->getSummary();
foreach ($matches as $match) {
    echo $match->getHomeTeam()->getName() . " " . $match->getHomeScore() . " - " . $match->getAwayScore() . " " . $match->getAwayTeam()->getName() . '<br>' . PHP_EOL;
}