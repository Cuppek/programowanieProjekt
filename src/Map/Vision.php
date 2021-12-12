<?php

namespace Game\Map;

class Vision
{
    private Map $map;

    public function __construct()
    {
        $this->map = Map::getInstance();
    }

    public function showAround()
    {
        if ($this->map->checkNewRow($this->map->actualPosition[0] - 1)) {
            echo "North: " . $this->map->map[$this->map->actualPosition[0] - 1][$this->map->actualPosition[1]];
        } else {
            echo "North is blocked by big wall!";
        }
        echo " ";

        if ($this->map->checkNewRow($this->map->actualPosition[0] + 1)) {
            echo "South: " . $this->map->map[$this->map->actualPosition[0] + 1][$this->map->actualPosition[1]];
        } else {
            echo "South is blocked by big wall!";
        }
        echo " ";

        if ($this->map->checkNewColumn($this->map->actualPosition[1] - 1)) {
            echo "West: " . $this->map->map[$this->map->actualPosition[0]][$this->map->actualPosition[1] - 1];
        } else {
            echo "West is blocked by big wall!";
        }
        echo " ";

        if ($this->map->checkNewColumn($this->map->actualPosition[1] + 1)) {
            echo "East: " . $this->map->map[$this->map->actualPosition[0]][$this->map->actualPosition[1] + 1];
        } else {
            echo "East is blocked by big wall!";
        }
        echo PHP_EOL;
    }
}