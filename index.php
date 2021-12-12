<?php
include __DIR__ . '/vendor/autoload.php';

use Game\Game;

echo 'Hello World!' . PHP_EOL;

$game = new Game();
$game->run();