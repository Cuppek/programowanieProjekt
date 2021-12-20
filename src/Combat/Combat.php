<?php

namespace Game\Combat;

class Combat
{
    public object $player;
    public object $enemy;
    public bool $battleWon;

    public function __construct($player, $enemy)
    {
        $this->player = $player;
        $this->enemy = $enemy;
    }

    public function battle()
    {
        $this->startFight();
        while ($this->playerAction()) {
            $this->enemy->gotHit($this->player->attackPoints());
            $this->showHealthPoints($this->enemy);
            if ($this->enemy->isDead()) {
                $this->playerWon();
                $this->setBattleWon(true);
                break;
            }
            $this->player->gotHit($this->enemy->attackPoints());
            $this->showHealthPoints($this->player);
            if ($this->player->isDead()) {
                $this->setBattleWon(false);
            }
        }
    }

    private function startFight()
    {
        echo "New battle begins." . PHP_EOL;
        echo "Enemy HP: " . $this->enemy->lifePoints . PHP_EOL;
        echo "Your HP: " . $this->player->lifePoints . PHP_EOL;
    }

    private function playerWon()
    {
        echo "You won!" . PHP_EOL;
    }

    private function runAway()
    {
        echo "Why are You running?!" . PHP_EOL;
    }

    private function playerAction(): bool
    {
        if ($this->playerMove() === "a"){
            return true;
        }
        $this->runAway();
        return false;
    }

    private function playerMove(): string
    {
        return trim(strtolower(readline()));
    }

    private function showHealthPoints($character)
    {
        echo $character . " HP: " . $character->lifePoints . PHP_EOL;
    }

    public function isBattleWon(): bool
    {
        return $this->battleWon;
    }

    public function setBattleWon(bool $battleWon): void
    {
        $this->battleWon = $battleWon;
    }
}