<?php
include __DIR__ . '/../vendor/autoload.php';

echo 'Hello World!' . PHP_EOL;

$map = new Game\map\Map();

$map->drawMap(5, 7);
//$map->showMap();

while (true)
{
    $map->makeMove(strtolower(readline("w/a/s/d: ")));
    $map->showActualPosition();
}