# CurrencyPHP FixerIO Rate Fetcher

[![Build Status](https://travis-ci.org/TomWright/CurrencyPHPFixerIORateFetcher.svg?branch=master)](https://travis-ci.org/TomWright/CurrencyPHPFixerIORateFetcher)
[![Latest Stable Version](https://poser.pugx.org/tomwright/currency-php-fixerio-rate-fetcher/v/stable)](https://packagist.org/packages/tomwright/currency-php-fixerio-rate-fetcher)
[![Total Downloads](https://poser.pugx.org/tomwright/currency-php-fixerio-rate-fetcher/downloads)](https://packagist.org/packages/tomwright/currency-php-fixerio-rate-fetcher)
[![Monthly Downloads](https://poser.pugx.org/tomwright/currency-php-fixerio-rate-fetcher/d/monthly)](https://packagist.org/packages/tomwright/currency-php-fixerio-rate-fetcher)
[![Daily Downloads](https://poser.pugx.org/tomwright/currency-php-fixerio-rate-fetcher/d/daily)](https://packagist.org/packages/tomwright/currency-php-fixerio-rate-fetcher)
[![License](https://poser.pugx.org/tomwright/currency-php-fixerio-rate-fetcher/license.svg)](https://packagist.org/packages/tomwright/currency-php-fixerio-rate-fetcher)

## Installation

Install [CurrencyPHP](https://github.com/TomWright/CurrencyPHP).
```
composer require tomwright/currency-php
composer require tomwright/currency-php-fixerio-rate-fetcher
```

## Usage

FixerIORateFetcher is just a RateFetcher for [CurrencyPHP](https://github.com/TomWright/CurrencyPHP).

```php

$rateFetcher = new FixerIORateFetcher();

$gbp = new Currency('GBP', $rateFetcher);
$usd = new Currency('USD', $rateFetcher);

$priceInGBP = 100;
$priceInUSD = $gbp->convertTo($usd, $priceInGBP);
echo $priceInUSD; // 126
```
