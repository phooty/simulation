<?php
namespace Phooty\Simulation\Support;

use Phooty\Simulation\Emitter;
use Phooty\Simulation\Support\Traits\EmitsEvents;

class Timer
{
    use EmitsEvents;

    /**
     * The total time elapsed in ms.
     *
     * @var int
     */
    private $total = 0;

    /**
     * The time elapsed for the current period.
     *
     * @var int
     */
    private $current = 0;
    
    /**
     * The maximum period length.
     *
     * @var int
     */
    private $period_length;

    /**
     * The number of times the current timer has been reset.
     *
     * @var int
     */
    private $resets = 0;

    public function __construct(int $period_length, Emitter $emitter)
    {
        if (1 > $period_length) {
            throw new \InvalidArgumentException(
                "Period length must be greater than 1."
            );
        }

        $this->period_length = $period_length;

        $this->emitter = $emitter;
    }

    public function tick(int $ms = 1)
    {
        if (1 > $ms) {
            throw new \InvalidArgumentException(
                "Ticks cannot be less than 1 millisecond."
            );
        }

        $this->current += $ms;
        $this->total += $ms;

        $this->emit('timer.tick');

        if ($this->current >= $this->period_length) {
            $this->reset();
        }

        return $this;
    }

    public function reset()
    {
        $this->current = 0;
        $this->resets++;

        $this->emit('sim.endPeriod');

        return $this;
    }

    /**
     * Get the total time elapsed in ms.
     *
     * @return  int
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the time elapsed for the current period.
     *
     * @return  int
     */ 
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Get the number of times the current timer has been reset.
     *
     * @return  int
     */ 
    public function getResets()
    {
        return $this->resets;
    }

    /**
     * Get the maximum period length.
     *
     * @return  int
     */ 
    public function getPeriodLength()
    {
        return $this->period_length;
    }
}
