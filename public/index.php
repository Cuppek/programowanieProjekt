<?php
include __DIR__ . '/../vendor/autoload.php';

echo 'Hello World!' . PHP_EOL;

$map = new Game\map\Map();

$map->drawMap(5, 7);
$map->map[3][3] = null;
//$map->showMap();

while (true)
{
    echo "w/a/s/d/show/exit\n";
    $map->makeMove(strtolower(readline()));
    $map->showActualPosition();
}