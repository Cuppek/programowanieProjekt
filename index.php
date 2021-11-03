<?php
include __DIR__ . '/vendor/autoload.php';

echo 'Hello World!' . PHP_EOL;

$game = new \Game\Game();
$game->run();