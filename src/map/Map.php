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

    public function showMap() : void //only for development purposes
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
                $this->checkRowPosition($this->actualPosition[0] - 1);
                break;
            case "down":
                $this->checkRowPosition($this->actualPosition[0] + 1);
                break;
            case "right":
                $this->checkColumnPosition($this->actualPosition[1] + 1);
                break;
            case "left":
                $this->checkColumnPosition($this->actualPosition[1] - 1);
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

    private function checkRowPosition($condition)
    {
       if (isset($this->map[$condition]))
       {
           $this->actualPosition[0] = $condition;
       } else {
           $this->endOfMap();
       }
    }

    private function checkColumnPosition($condition)
    {
        if (isset($this->map[$this->actualPosition[1]][$condition]))
        {
            $this->actualPosition[1] = $condition;
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