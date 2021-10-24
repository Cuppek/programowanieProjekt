<?php
include __DIR__ . '/../vendor/autoload.php';

echo 'Hello World!' . PHP_EOL;

$map = new Game\map\Map();

$map->drawMap(24, 24);
$map->showMap();
$actualPosition[0] = 1;
$actualPosition[1] = 1;

$map->showPosition($actualPosition);
while (true)
{
    $direction = readline();
    $actualPosition = $map->makeMove($actualPosition, $direction);
    $map->showPosition($actualPosition);
}