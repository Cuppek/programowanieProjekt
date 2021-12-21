<?php

namespace Game;

use Game\Characters\Monster;
use Game\Characters\Player;
use Game\Combat\Combat;
use Game\Map\Map;
use Game\Map\Vision;

/**
 * Application entry point
 */
class Game
{
    private Map $map;
    private Vision $vision;
    private Player $player;
    private Monster $enemy;

    public function __construct()
    {
        $this->map = Map::getInstance();
        $this->vision = new Vision();
        $this->player = new Player(10, 3, 0);
        $this->enemy = new Monster(7, 2, 0);
    }

    public function run()
    {
        $this->map->drawMap(7, 14); // TODO: Method to set map size based on map file input
//        $this->map->showMap(); // For development purposes

        $this->enemy = new Monster(10, 2, 0);
        $this->combat();

        $this->enemy = new Monster(5, 1, 0);
        $this->combat();

        $this->showInstruction();

        while (true) {
            echo $this->map->getActualPosition();
            echo $this->vision->getFieldDescription();
            $this->vision->showAround();
            $this->map->chooseAction($this->userInput());
        }
    }

    private function combat()
    {
        $combat = new Combat($this->player, $this->enemy);
        $combat->battle();
        if (isset($combat->battleWon)) {
            if ($combat->isBattleWon()) {
                unset($this->enemy);
            } else {
                $this->player->dead();
            }
        }
    }

    public static function showInstruction()
    {
        echo "Available commands: w/a/s/d/show/instruction/exit,quit\n";
        echo "To move you can use up, north / left, west / down, south / right, east as well\n";
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