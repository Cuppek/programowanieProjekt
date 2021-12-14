<?php

namespace Game\Eq;

class Equipment
{
    private object $items;

    public function __construct()
    {
    }

    public function giveEq($fileName)
    {
        $this->items = simplexml_load_file(__DIR__ . '/' . $fileName . '.xml');
    }

    public function getItems()
    {
        return $this->items;
    }

    public function showEq()
    {
        echo "Your things: " . PHP_EOL;
        foreach ($this->items->item as $item => $name) {
            echo $name->name . " - " . $name->desc . PHP_EOL;
        }
    }
}