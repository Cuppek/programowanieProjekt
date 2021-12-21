<?php

namespace Game\Combat;

class Combat
{
    public object $player;
    public object $enemy;
    public bool $battleWon;
    private int $attackPoints;

    public function __construct($player, $enemy)
    {
        $this->player = $player;
        $this->enemy = $enemy;
    }

    public function battle()
    {
        $this->startFight();
        while ($this->playerAction()) {
            $this->setAttackPoints($this->player->attackPoints());
            $this->enemy->gotHit($this->getAttackPoints());
            $this->showAttackStats($this->player);
            $this->showHealthPoints($this->enemy);
            if ($this->enemy->isDead()) {
                $this->playerWon();
                $this->setBattleWon(true);
                break;
            }
            $this->setAttackPoints($this->enemy->attackPoints());
            $this->player->gotHit($this->attackPoints);
            $this->showAttackStats($this->enemy);
            $this->showHealthPoints($this->player);
            if ($this->player->isDead()) {
                echo "lol\n";
                $this->setBattleWon(false);
                break;
            }
        }
    }

    private function startFight()
    {
        echo "New battle begins." . PHP_EOL;
        echo "Enemy HP: " . $this->enemy->lifePoints . PHP_EOL;
        echo "Your HP: " . $this->player->lifePoints . PHP_EOL;
        echo "Use a to attack, anything else to run away." . PHP_EOL;
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
        if ($this->playerAttack()) {
            return true;
        }
        if ($this->runAwayConfirmation()) {
            $this->runAway();
            return false;
        } else {
            return true;
        }
    }

    private function runAwayConfirmation(): bool
    {
        echo "Do You really want to end battle this way? (y/n)" . PHP_EOL;
        while (true) {
            $input = $this->playerInput();
            if ($input === "y") {
                return true;
            } else {
                if ($input === "n") {
                    return false;
                }
            }
            echo "y/n" . PHP_EOL;
        }
    }

    private function playerAttack(): bool
    {
        if ($this->playerInput() === "a") {
            return true;
        }
        return false;
    }

    private function playerInput(): string
    {
        return trim(strtolower(readline()));
    }

    private function showAttackStats($character)
    {
        echo $character . " attacks with power: " . $this->getAttackPoints() . PHP_EOL;
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

    public function getAttackPoints(): int
    {
        return $this->attackPoints;
    }

    public function setAttackPoints(int $attackPoints): void
    {
        $this->attackPoints = $attackPoints;
    }
}