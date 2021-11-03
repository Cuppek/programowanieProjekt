<?php

namespace Game\map;

class Map
{
    /**
     * @var array
     */
    public array $map;
    private array $actualPosition;

    public function __construct()
    {
        $this->map = [];
        $this->actualPosition[0] = 2; // row number
        $this->actualPosition[1] = 2; // column number
    }

    /**
     * @param int $mapWidth
     * @param int $mapHeight
     */
    public function drawMap(int $mapWidth = 0, int $mapHeight = 0)
    {
        for ($i = 0; $i < $mapHeight; $i++) {
            for ($j = 0; $j < $mapWidth; $j++) {
                $this->map[$i][$j] = $i . "." . $j;
            }
        }
    }

    public function showMap(): void //only for development purposes
    {
        foreach ($this->map as $item) {
            foreach ($item as $it) {
                echo $it . " ";
            }
            echo PHP_EOL;
        }
    }

    public function makeMove($direction)
    {
        switch ($direction) {
            case "up":
            case "w":
                $this->checkRowPositionAndMove($this->actualPosition[0] - 1);
                break;
            case "down":
            case "s":
                $this->checkRowPositionAndMove($this->actualPosition[0] + 1);
                break;
            case "right":
            case "d":
                $this->checkColumnPositionAndMove($this->actualPosition[1] + 1);
                break;
            case "left":
            case "a":
                $this->checkColumnPositionAndMove($this->actualPosition[1] - 1);
                break;
            case "show":
                $this->showActualPosition();
                break;
            case "exit":
                exit(0);
            default:
                echo "Choose wisely!" . PHP_EOL;
        }
    }

    private function checkRowPositionAndMove($newPosition)
    {
        if (isset($this->map[$newPosition][$this->actualPosition[1]])) {
            $this->actualPosition[0] = $newPosition;
        } else {
            $this->endOfMap();
        }
    }

    private function checkColumnPositionAndMove($newPosition)
    {
        if (isset($this->map[$this->actualPosition[0]][$newPosition])) {
            $this->actualPosition[1] = $newPosition;
        } else {
            $this->endOfMap();
        }
    }

    public function showActualPosition()
    {
        echo $this->map[$this->actualPosition[0]][$this->actualPosition[1]] . PHP_EOL;
    }

    private function endOfMap()
    {
        echo "You can't go there" . PHP_EOL;
    }
}