<?php

namespace Soisy;

use Soisy\Exceptions\InvalidAmountException;
use Soisy\Exceptions\InvalidRatingException;

/**
 * Class Loan
 *
 * @package Soisy
 */
class Fund implements FundInterface
{

    /** @var float */
    protected $amount;

    /** @var int */
    protected $rating;

    /**
     * Definisce l'investimento.
     *
     * @param float $amount valore numerico maggiore di 1
     * @param int $rating valore numerico compreso tra 1 e 5
     * @throws InvalidAmountException
     * @throws InvalidRatingException
     */
    public function __construct(float $amount, int $rating)
    {
        try {
            $this->setAmount($amount);
            $this->setRating($rating);
        }catch (InvalidAmountException $iae){
            throw $iae;
        }catch (InvalidRatingException $ire){
            throw $ire;
        }
    }

    /**
     *
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Fund
     * @throws InvalidAmountException
     */
    public function setAmount(float $amount): self
    {
        if($amount>=1) {
            $this->amount = $amount;
            return $this;
        }
        throw new InvalidAmountException();
    }

    /**
     *
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     * @return Fund
     * @throws InvalidRatingException
     */
    public function setRating(int $rating): self
    {
        if($rating>=1 && $rating<=5) {
            $this->rating = $rating;
            return $this;
        }
        throw new InvalidRatingException();
    }


}
