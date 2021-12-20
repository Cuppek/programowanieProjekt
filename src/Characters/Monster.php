<?php

namespace Game\Characters;

class Monster extends Character
{
    public int $toxicity;

    public function __construct($lifePoints, $strength, $toxicity)
    {
        parent::__construct($lifePoints, $strength);
        $this->toxicity = $toxicity;
    }

    public function __toString()
    {
        return "Monster";
    }
}