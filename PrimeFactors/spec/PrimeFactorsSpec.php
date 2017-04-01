<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PrimeFactors;

class PrimeFactorsSpec extends ObjectBehavior
{
    
	public function it_returns_empty_for_0()
    {
    	$this->generate(0)->shouldReturn([]);
    }

    public function it_returns_empty_for_1()
    {
    	$this->generate(1)->shouldReturn([]);
    }

    public function it_returns_2_for_2()
    {
    	$this->generate(2)->shouldReturn([2]);
    }

    public function it_returns_3_for_3()
    {
    	$this->generate(3)->shouldReturn([3]);
    }

    public function it_returns_2_2_for_4()
    {
    	$this->generate(4)->shouldReturn([2, 2]);
    }

    public function it_returns_2_2_5_5_for_100()
    {
    	$this->generate(100)->shouldReturn([2, 2, 5, 5]);
    }

    public function it_throws_exception_for_float_number()
    {
        $this->shouldThrow('InvalidArgumentException')->duringGenerate(5.5);
    }
}
