<?php

namespace Game\Characters;

abstract class Character
{
    public int $lifePoints;
    public int $strength;

    protected function __construct($lifePoints, $strength)
    {
        $this->lifePoints = $lifePoints;
        $this->strength = $strength;
    }

    public function isDead(): bool
    {
        return ($this->lifePoints <= 0);
    }
}