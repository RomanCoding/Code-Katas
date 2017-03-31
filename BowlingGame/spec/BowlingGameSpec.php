<?php

namespace spec;

use BowlingGame;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    public function it_returns_score_after_spare()
    {
    	$this->hit(5, 2);
    	$this->hit(6, 4);
    	$this->hit(4, 2);
    	$this->getScore()->shouldReturn(27);
    }

    public function it_conts_score_after_strike()
    {
    	$this->hit(10);
    	$this->hit(2, 4);
    	$this->getScore()->shouldReturn(22);
    }

    public function it_counts_perfect_game()
    {
    	for ($i = 0; $i < 12; $i++)
    	{
    		$this->hit(10);
    	}
    	$this->getScore()->shouldReturn(300);
    }

    public function it_counts_score_for_full_game()
    {
    	$this->hit(10); // strike
    	$this->hit(3, 7); // spare
    	$this->hit(6, 1);
    	$this->hit(10); // strike
    	$this->hit(10); // strike
    	$this->hit(10); // strike
    	$this->hit(2, 8); // spare
    	$this->hit(9, 0);
    	$this->hit(7, 3); // spare
    	$this->hit(10); // strike
    	/* Bonus hits for last strike */
    	$this->hit(10); // strike
    	$this->hit(10); // strike
    	$this->getScore()->shouldReturn(193);
    }

}
