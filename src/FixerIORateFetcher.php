<?php


namespace TomWright\CurrencyPHP\FixerIORateFetcher;


use TomWright\CurrencyPHP\ConversionRateFetcherInterface;
use TomWright\CurrencyPHP\Currency;
use TomWright\CurrencyPHP\FixerIORateFetcher\Exception\InvalidApiResponse;

class FixerIORateFetcher implements ConversionRateFetcherInterface
{

    /**
     * @var string
     */
    protected $date;

    public function __construct()
    {
        $this->setDate('latest');
    }

    /**
     * Gets the Currency conversion rate between $from and $to.
     * @param Currency $from
     * @param Currency $to
     * @return float|null
     * @throws InvalidApiResponse
     */
    public function getConversionRate(Currency $from, Currency $to)
    {
        $url = "https://api.fixer.io/{$this->getDate()}";

        $params = [
            'base' => $from->getCurrencyCode(),
        ];
        $paramsString = http_build_query($params);

        $url .= "?{$paramsString}";

        $ch = curl_init();
        $ops = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
        ];
        curl_setopt_array($ch, $ops);
        $result = curl_exec($ch);

        if (! (is_string($result) && strlen($result) > 0)) {
            throw new InvalidApiResponse('Invalid FixerIO API Response.');
        }

        $resultObject = json_decode($result);
        if (! is_object($resultObject)) {
            throw new InvalidApiResponse('Invalid FixerIO API Response. Not valid JSON.');
        }
        if (! isset($resultObject->rates->{$to->getCurrencyCode()})) {
            return null;
        }

        return $resultObject->rates->{$to->getCurrencyCode()};
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}
