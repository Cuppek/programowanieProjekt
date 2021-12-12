<?php

namespace Game;

/**
 * Application entry point
 */
class Game
{
    public function run()
    {
        $map = new map\Map();

        $map->drawMap(5, 7);
        $map->map[3][3] = null;
        $map->showMap(); // For development purposes

        $this->instruction();

        while (true) {
            $map->makeMove(trim(strtolower(readline())));
            $map->showActualPosition();
        }
    }

    public static function instruction()
    {
        echo "w/a/s/d/show/instruction/exit,quit\n";
        echo "To move you can use up,north / left,west / down,south / right,east as well\n";
    }
}