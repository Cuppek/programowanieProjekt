<?php

namespace Game\Map;

class Vision
{
    private Map $map;

    public function __construct()
    {
        $this->map = Map::getInstance();
    }

    public function showAround(): void
    {
        echo "North: ";
        if ($this->map->checkNewRow($this->map->actualPosition[0] - 1)) {
            echo $this->map->map[$this->map->actualPosition[0] - 1][$this->map->actualPosition[1]];
        } else {
            echo $this->map->plan->getMap()[$this->map->actualPosition[0] - 1][$this->map->actualPosition[1]]->desc;
        }

        echo "; South: ";
        if ($this->map->checkNewRow($this->map->actualPosition[0] + 1)) {
            echo $this->map->map[$this->map->actualPosition[0] + 1][$this->map->actualPosition[1]];
        } else {
            echo $this->map->plan->getMap()[$this->map->actualPosition[0] + 1][$this->map->actualPosition[1]]->desc;
        }

        echo "; West: ";
        if ($this->map->checkNewColumn($this->map->actualPosition[1] - 1)) {
            echo $this->map->map[$this->map->actualPosition[0]][$this->map->actualPosition[1] - 1];
        } else {
            echo $this->map->plan->getMap()[$this->map->actualPosition[0]][$this->map->actualPosition[1] - 1]->desc;
        }

        echo "; East: ";
        if ($this->map->checkNewColumn($this->map->actualPosition[1] + 1)) {
            echo $this->map->map[$this->map->actualPosition[0]][$this->map->actualPosition[1] + 1];
        } else {
            echo $this->map->plan->getMap()[$this->map->actualPosition[0]][$this->map->actualPosition[1] + 1]->desc;
        }
        echo PHP_EOL;
    }

    public function getFieldDescription(): string
    {
        return $this->map->plan->getMap()[$this->map->actualPosition[0]][$this->map->actualPosition[1]]->desc . PHP_EOL;
    }
}