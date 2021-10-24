<?php
namespace Game;

/**
 * Application entry point
 */
class Game
{
    /**
     * @var bool
     */
    private $run;

    public function run() : bool
    {
        return $this->run = true;
    }
}