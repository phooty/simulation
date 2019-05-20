<?php
namespace Phooty\Simulation\Support;

use Phooty\Simulation\Dispatcher;

class Timer extends Emitter
{
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

    public function __construct(int $period_length, Dispatcher $dispatcher)
    {
        if (1 > $period_length) {
            throw new \InvalidArgumentException(
                "Period length must be greater than 1."
            );
        }

        $this->period_length = $period_length;

        parent::__construct($dispatcher);
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

        return $this;
    }

    public function reset()
    {
        $this->current = 0;
        $this->resets++;
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
}
