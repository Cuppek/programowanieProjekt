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
            echo "There is nothing on the north!";
        }
        echo " ";

        if ($this->map->checkNewRow($this->map->actualPosition[0] + 1)) {
            echo "South: " . $this->map->map[$this->map->actualPosition[0] + 1][$this->map->actualPosition[1]];
        } else {
            echo "There is nothing on the South!";
        }
        echo " ";

        if ($this->map->checkNewColumn($this->map->actualPosition[1] - 1)) {
            echo "West: " . $this->map->map[$this->map->actualPosition[0]][$this->map->actualPosition[1] - 1];
        } else {
            echo "There is nothing on the West!";
        }
        echo " ";

        if ($this->map->checkNewColumn($this->map->actualPosition[1] + 1)) {
            echo "East: " . $this->map->map[$this->map->actualPosition[0]][$this->map->actualPosition[1] + 1];
        } else {
            echo "There is nothing on the East!";
        }
        echo " ";
    }
}