<?php

namespace Game;

/**
 * Application entry point
 */
class Game
{
    private bool $run;

    public function run()
    {
        $map = new map\Map();

        $map->drawMap(5, 7);
        $map->map[3][3] = null;
        //$map->showMap();

        while (true) {
            echo "w/a/s/d/show/exit\n";
            $map->makeMove(strtolower(readline()));
            $map->showActualPosition();
        }
    }
}