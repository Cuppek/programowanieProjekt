<?php
namespace Game\Map;

class Map
{
    /**
     * @var array
     */
    public array $map;

    public function __construct()
    {
        $this->map = [];
    }

    /**
     * @param int $mapWidth
     * @param int $mapHeight
     */
    public function drawMap(int $mapWidth = 0, int $mapHeight = 0)
    {
        for ($i = 0; $i < $mapHeight; $i++)
        {
            for ($j = 0; $j < $mapWidth; $j++)
            {
                $this->map[$i][$j] = $i . "." . $j;
            }
        }

//        $this->map = [
//            ["0.0", "0.1", "0.2", "0.3"],
//            ["1.0", "1.1", "1.2", "1.3"],
//            ["2.0", "2.1", "2.2", "2.3"],
//            ["3.0", "3.1", "3.2", "3.3"]];
    }

    public function showMap() : void //only for development purpose
    {
        foreach ($this->map as $item) {
            foreach ($item as $it) {
                echo $it . " ";
            }
            echo PHP_EOL;
        }
    }

    public function showPosition($actualPosition)
    {
        echo $this->map[$actualPosition[0]][$actualPosition[1]] . PHP_EOL;
    }

    public function makeMove($actualPosition, $direction) : array
    {
        switch ($direction) {
            case "up":
                $actualPosition[0] -= 1;
                break;
            case "down":
                $actualPosition[0] += 1;
                break;
            case "right":
                $actualPosition[1] += 1;
                break;
            case "left":
                $actualPosition[1] -= 1;
                break;
        }
        return $actualPosition;
    }
}