<?php
namespace Phooty\Simulation;

use Phooty\Simulation\Tilemap\Tilemap;

class MatchContainer
{
    /**
     * The Match's tilemap
     *
     * @var Tilemap
     */
    protected $tilemap;

    public function __construct(Tilemap $tilemap)
    {
        $this->tilemap = $tilemap;
    }

    /**
     * Get the Match's tilemap
     *
     * @return  Tilemap
     */ 
    public function getTilemap()
    {
        return $this->tilemap;
    }
}
