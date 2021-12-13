<?php

namespace Game\Map;

class LoadMap
{
    public $map;

    public function __construct()
    {
        $this->map = simplexml_load_file(__DIR__ . '/world.xml');
    }

    public function getMap()
    {
        $i = 0;
        foreach ($this->map->row as $row) {
            foreach ($row->field as $field) {
                $newMap[$i][] = $field;
            }
            $i += 1;
        }
        return $newMap;
    }
}