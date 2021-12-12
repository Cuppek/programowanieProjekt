<?php

namespace Game\map;

use Game\Game;

class Map
{
    public array $map;
    private array $actualPosition;

    public function __construct()
    {
        $this->map = [];

        /**
         * Starting row number
         */
        $this->actualPosition[0] = 2;

        /**
         * Starting column number
         */
        $this->actualPosition[1] = 2;
    }

    public function drawMap(int $mapWidth, int $mapHeight)
    {
        for ($i = 0; $i < $mapHeight; $i++) {
            for ($j = 0; $j < $mapWidth; $j++) {
                $this->map[$i][$j] = $i . "." . $j;
            }
        }
    }

    public function showMap(): void //only for development purposes
    {
        foreach ($this->map as $item => $it) {
            foreach ($it as $i => $string) {
                if ($string !== null) {
                    echo $string . " ";
                } else {
                    echo "X.X ";
                }
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function makeMove($direction)
    {
        switch ($direction) {
            case "north":
            case "up":
            case "w":
                $this->rowMove($this->actualPosition[0] - 1);
                break;
            case "south":
            case "down":
            case "s":
                $this->rowMove($this->actualPosition[0] + 1);
                break;
            case "east":
            case "right":
            case "d":
                $this->columnMove($this->actualPosition[1] + 1);
                break;
            case "west":
            case "left":
            case "a":
                $this->columnMove($this->actualPosition[1] - 1);
                break;
            case "show":
                $this->showActualPosition();
                break;
            case "instruction":
                Game::instruction();
                break;
            case "quit":
            case "exit":
                exit(0);
            default:
                echo "Choose wisely!" . PHP_EOL;
        }
    }

    private function checkNewRow($newPosition): bool
    {
        return isset($this->map[$newPosition][$this->actualPosition[1]]);
    }

    private function checkNewColumn($newPosition): bool
    {
        return isset($this->map[$this->actualPosition[0]][$newPosition]);
    }

    private function rowMove($newPosition)
    {
        if ($this->checkNewRow($newPosition)) {
            $this->actualPosition[0] = $newPosition;
        } else {
            $this->unreachablePosition();
        }
    }

    private function columnMove($newPosition)
    {
        if ($this->checkNewColumn($newPosition)) {
            $this->actualPosition[1] = $newPosition;
        } else {
            $this->unreachablePosition();
        }
    }

    public function showActualPosition()
    {
        echo $this->map[$this->actualPosition[0]][$this->actualPosition[1]] . PHP_EOL;
    }

    private function unreachablePosition()
    {
        echo "You can't go there" . PHP_EOL;
    }
}