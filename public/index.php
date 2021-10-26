<?php
include __DIR__ . '/../vendor/autoload.php';

echo 'Hello World!' . PHP_EOL;

$map = new Game\map\Map();

$map->drawMap(3, 7);
//$map->showMap();

while (true)
{
    $map->makeMove(readline());
    $map->showActualPosition();
}