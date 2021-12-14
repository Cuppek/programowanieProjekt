<?php

namespace Game\Characters;

class Human extends Character
{
    public int $manaPoints;

    public function __construct($lifePoints, $strength, $manaPoints)
    {
        parent::__construct($lifePoints, $strength);
        $this->manaPoints = $manaPoints;
    }
}