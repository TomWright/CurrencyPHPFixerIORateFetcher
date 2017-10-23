<?php

use PHPUnit\Framework\TestCase;
use TomWright\CurrencyPHP\Currency;
use TomWright\CurrencyPHP\FixerIORateFetcher\FixerIORateFetcher;

class FixerIOCurrencyConversionTest extends TestCase
{

    public function testCurrencyConversion()
    {
        $rateFetcher = new FixerIORateFetcher();

        $gbp = new Currency('GBP', $rateFetcher);
        $usd = new Currency('USD', $rateFetcher);

        $this->assertTrue(is_numeric($gbp->convertTo($usd, 100)));
        $this->assertTrue(is_numeric($usd->convertTo($gbp, 125.26)));
    }

}