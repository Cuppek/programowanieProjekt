<?php

namespace Game;

use Game\Map\Map;
use Game\Map\Vision;
use Game\Eq\Equipment;

/**
 * Application entry point
 */
class Game
{
    private Map $map;
    private Vision $vision;
    private Equipment $equipment;

    public function __construct()
    {
        $this->map = Map::getInstance();
        $this->vision = new Vision();
        $this->equipment = new Equipment();
    }

    public function run()
    {
        $this->map->drawMap(7, 14); // TODO: Class to set map size based on map file input
//        $this->map->showMap(); // For development purposes

        $this->equipment->giveEq("basic");
        var_dump($this->equipment->getItems());
        $this->showInstruction();

        while (true) {
            echo $this->map->getActualPosition();
            echo $this->vision->getFieldDescription();
            $this->vision->showAround();
            $this->map->chooseAction($this->userInput());
        }
    }

    public static function showInstruction()
    {
        echo "w/a/s/d/show/instruction/exit,quit\n";
        echo "To move you can use up,north / left,west / down,south / right,east as well\n";
    }

    public static function endGame()
    {
        echo "Thank you for playing!\n";
        exit(0);
    }

    private function userInput(): string
    {
        return trim(strtolower(readline()));
    }
}