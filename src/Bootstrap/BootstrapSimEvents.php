<?php
namespace Phooty\Simulation\Bootstrap;

use Phooty\Simulation\Emitter;
use Phooty\Simulation\MatchSimulator;
use Phooty\Simulation\Support\Traits\SimAware;

class BootstrapSimEvents
{
    use SimAware;

    public function __construct(MatchSimulator $sim)
    {
        $this->sim = $sim;
    }

    public function bootstrap(Emitter $emitter)
    {
        $emitter->on('sim.endPeriod', function () {
            
        });


        return $emitter;
    }
}
