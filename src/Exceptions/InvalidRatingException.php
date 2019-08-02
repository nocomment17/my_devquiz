<?php


namespace Soisy\Exceptions;

class InvalidRatingException extends \Exception
{
    protected $message = "Rating should be between 1 and 5";
}