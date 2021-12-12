<?php

namespace Game;

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

        $this->map->drawMap(5, 7); // TODO: Class to set map size and blank points
        $this->map->map[3][3] = null;
        $this->map->showMap(); // For development purposes

        $this->instruction();

        while (true) {
            $this->map->chooseAction(trim(strtolower(readline())));
            echo $this->map->getActualPosition();
            $this->vision->showAround();
        }
    }

    public static function instruction()
    {
        echo "w/a/s/d/show/instruction/exit,quit\n";
        echo "To move you can use up,north / left,west / down,south / right,east as well\n";
    }

    public static function endGame()
    {
        echo "Thank you for playing!\n";
        exit(0);
    }
}