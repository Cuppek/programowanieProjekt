<?php

namespace Game\Map;

use Game\Game;

class Map
{
    public array $map;
    public array $actualPosition;
    public LoadMap $plan;
    private static ?Map $instance = null;

    private function __construct()
    {
        $this->plan = new LoadMap();

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

    public static function getInstance(): Map
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function drawMap(int $mapWidth, int $mapHeight): void // setMap()
    {
        $loadedPlan = $this->plan->getMap();
        for ($i = 0; $i < $mapHeight; $i++) {
            for ($j = 0; $j < $mapWidth; $j++) {
                $this->map[$i][$j] = $loadedPlan[$i][$j]->name;
            }
        }
    }

    public function showMap(): void //only for development purposes
    {
        foreach ($this->map as $item) {
            foreach ($item as $string) {
                if ($string !== null) {
                    echo $string . "\t\t";
                } else {
                    echo "X.X ";
                }
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function chooseAction($action): void
    {
        switch ($action) {
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
                $this->getActualPosition();
                break;
            case "instruction":
                Game::showInstruction();
                break;
            case "quit":
            case "exit":
                Game::endGame();
                break;
            default:
                echo "Choose wisely!" . PHP_EOL;
        }
    }

    public function checkNewRow($newPosition): bool
    {
        if (!isset($this->map[$newPosition][$this->actualPosition[1]])) {
            return false;
        }
        return $this->map[$newPosition][$this->actualPosition[1]] != "null";
    }

    public function checkNewColumn($newPosition): bool
    {
        if (!isset($this->map[$this->actualPosition[0]][$newPosition])) {
            return false;
        }
        return $this->map[$this->actualPosition[0]][$newPosition] != "null";
    }

    private function rowMove($newPosition): void
    {
        if ($this->checkNewRow($newPosition)) {
            $this->actualPosition[0] = $newPosition;
        } else {
            $this->unreachablePosition();
        }
    }

    private function columnMove($newPosition): void
    {
        if ($this->checkNewColumn($newPosition)) {
            $this->actualPosition[1] = $newPosition;
        } else {
            $this->unreachablePosition();
        }
    }

    public function getActualPosition(): string
    {
        return $this->map[$this->actualPosition[0]][$this->actualPosition[1]] . PHP_EOL;
    }

    private function unreachablePosition(): void
    {
        echo "You can't go there" . PHP_EOL;
    }
}