<?php
namespace Phooty\Simulation\Entities;

use Ramsey\Uuid\Uuid;
use Phooty\Simulation\Support\Traits\IsPositionable;
use Phooty\Simulation\Contract\MovableEntity;

abstract class SimulationEntity implements MovableEntity
{
    use IsPositionable;

    /**
     * The entity's UUID
     *
     * @var Uuid
     */
    protected $id;

    abstract protected function initialize(array $data);

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? Uuid::uuid1();

        $this->initialize($data);
    }

    /**
     * Get the entity's UUID
     *
     * @return  string
     */ 
    public function getId()
    {
        return $this->id->toString();
    }
}
