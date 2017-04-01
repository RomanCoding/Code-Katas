<?php

class PrimeFactors
{

    /**
     * Translate number into array of prime numbers.
     *
     * @param $number
     * @return array
     */
    public function generate($number): array
    {
        if (!is_int($number)) 
        {
            throw new InvalidArgumentException('You should pass an integer number.');
        }
    	$divisor = 2;
    	$result = [];
    	for (; $number > 1; $divisor++)
    	{
    		for(; $number % $divisor == 0; $number /= $divisor)
    		{
    			$result[] = $divisor;
    		}
    	}
    	return $result;
    }
} 