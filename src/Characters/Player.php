<?php

namespace Game\Characters;

use Game\Eq\Equipment;

class Player extends Human
{
    public Equipment $equipment;

    public function __construct($lifePoints, $strength, $manaPoints)
    {
        parent::__construct($lifePoints, $strength, $manaPoints);
        $this->equipment = new Equipment();
        $this->equipment->giveEq("basic");
    }

    public function dead()
    {
        exit ("You Died");
    }

    public function __toString()
    {
        return "Player";
    }
}