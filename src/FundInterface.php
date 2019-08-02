<?php

namespace Soisy;

use Soisy\Exceptions\InvalidAmountException;
use Soisy\Exceptions\InvalidRatingException;

/**
 * Class Loan
 *
 * @package Soisy
 */
interface FundInterface
{

    /**
     *
     * @return float
     */
    public function getAmount(): float;

    /**
     * @param float $amount
     * @throws InvalidAmountException
     */
    public function setAmount(float $amount);

    /**
     *
     * @return int
     */
    public function getRating(): int;

    /**
     * @param int $rating
     * @throws InvalidRatingException
     */
    public function setRating(int $rating);


}
