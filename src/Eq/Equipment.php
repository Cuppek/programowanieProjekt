<?php

namespace Game\Eq;

class Equipment
{
    private $items;

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
}