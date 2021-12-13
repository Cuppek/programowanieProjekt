<?php

namespace Game;

use Game\Map\LoadMap;
use Game\Map\Map;
use Game\Map\Vision;

/**
 * Application entry point
 */
class Game
{
    private Map $map;
    private Vision $vision;

    public function __construct()
    {
        $this->map = Map::getInstance();
        $this->vision = new Vision();
    }

    public function run()
    {
        $this->map->drawMap(7, 14); // TODO: Class to set map size and blank points
        $this->map->showMap(); // For development purposes

        $this->showInstruction();

        while (true) {
            $this->map->chooseAction($this->userInput());
            echo $this->map->getActualPosition();
            echo $this->vision->getFieldDescription();
            $this->vision->showAround();
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