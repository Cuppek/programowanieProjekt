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

    public function __toString()
    {
        return "Character";
    }

    public function attackPoints(): int
    {
        return $this->strength;
    }

    public function gotHit($attackPoints): void
    {
        $this->lifePoints -= $attackPoints;
    }

    public function isDead(): bool
    {
        return ($this->lifePoints <= 0);
    }
}