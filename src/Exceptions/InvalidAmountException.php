<?php


namespace Soisy\Exceptions;


class InvalidAmountException extends \Exception
{
    protected $message = "Amount should be positive";
}