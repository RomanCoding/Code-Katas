<?php

class BowlingGame
{

	/**
	 * All registered rolls for a game.
	 *
	 * @var array
	 */
	protected $rolls = [];


	/**
	 * Hit for a frame.
	 *
	 * @param integer $first 
	 * @param integer $second
	 * @return void
	 */
	public function hit(int $first, int $second = 0)
	{
		$this->rolls[] = [$first, $second];
	}

	/**
	 * Calculate the final score for a game.
	 *
	 * @return int
	 */
	public function getScore(): int
	{
		$score = 0;
		foreach ($this->rolls as $frame => $roll) 
		{
			$score += $this->getFrameScore($roll);
			if ($this->isStrike($roll) && $frame < 9)
			{
				$score += $this->getStrikeBonus($frame);
				if ($this->isStrike($this->rolls[$frame+1]))
				{
					$score += $this->getSpareBonus($frame+1);
				}
				continue;
			}
			if ($this->isSpare($roll) && $frame < 9)
			{
				$score += $this->getSpareBonus($frame);
			}
		}
		return $score;
	}

	/**
	 * Did the player make a spare?
	 *
	 * @param $roll
	 * @return bool
	 */
	private function isSpare(array $roll): bool
	{
		return ($roll[0] + $roll[1] == 10);
	}

	/**
	 * Did the player make a strike?
     *
	 * @param $roll
	 * @return bool
	 */
	private function isStrike(array $roll): bool
	{
		return ($roll[0] == 10);
	}

	/**
	 * Get the default sum of the two rolls for a frame.
	 *
	 * @param $roll
	 * @return int
	 */
	private function getFrameScore(array $roll): int
	{
		return array_sum($roll);
	}

	/**
	 * Get the bonus for a spare in a frame.
	 *
	 * @param $roll
	 * @return mixed
	 */
	private function getSpareBonus(int $frame): int
	{
		return $this->rolls[$frame+1][0] ?? 0;
	}

	/**
	 * Get the bonus for a strike in a frame.
	 *
	 * @param $roll
	 * @return mixed
	 */
	private function getStrikeBonus(int $frame): int
	{
		return array_sum($this->rolls[$frame+1] ?? []);
	}
}