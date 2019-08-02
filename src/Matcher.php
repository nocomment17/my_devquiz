<?php


namespace Soisy;

/**
 * Class Matcher
 *
 * @package Soisy
 */
class Matcher
{

    /** @var array */
    protected $matchers;
    /** @var array */
    protected $loan;
    /** @var array */
    protected $investment;

    public function __construct()
    {
        $this->matchers = [];
        $this->loan = [];
        $this->investment = [];
    }

    /**
     * Ritorna i prestiti inseriti
     * @return array
     */
    public function getLoans(): array
    {
        return array_values($this->loan);
    }

    /**
     * Ritorna gli investimenti inseriti
     * @return array
     */
    public function getInvestments(): array
    {
        return array_values($this->investment);
    }

    /**
     * @param Loan $loan Prestito
     */
    public function addLoan(Loan $loan): void {
        $this->loan[$loan->getRating()] = $loan;
    }

    /**
     * @param Investment $investment Investimento
     */
    public function addInvestment(Investment $investment): void {
        $this->investment[$investment->getRating()] = $investment;
    }

    public function addMatch(Loan $loan, Investment $investment): void {
        $this->addLoan($loan);
        $this->addInvestment($investment);
        $this->_addMatch($loan, $investment);
    }

    /**
     * Accopia gli investimenti con i prestiti
     */
    public function run(): void
    {
        $this->matchers = [];
        foreach ($this->loan as $k=>$v)
            if(array_key_exists($k, $this->investment))
                $this->_addMatch($v, $this->investment[$k]);
    }

    /**
     * Restituisce le coppie
     *
     * @return array
     */
    public function getMatches(): array{
        return $this->matchers;
    }

    /**
     * Esegue il check sui prestiti e investimenti
     *
     * @param Loan $loan
     * @param Investment $investment
     * @return bool
     */
    private function _checkMatch(Loan $loan, Investment $investment): bool {
        return (
            $loan->getRating()==$investment->getRating() &&
            $loan->getAmount()<=$investment->getAmount()
        );
    }

    /**
     * Aggiunge il match alla proprietà matchers se il check è positivo
     */
    private function _addMatch(Loan $loan, Investment $investment): void {
        if($this->_checkMatch($loan, $investment))
            $this->matchers[] = [
                "loan" => $loan,
                "investment" => $investment
            ];
    }
}