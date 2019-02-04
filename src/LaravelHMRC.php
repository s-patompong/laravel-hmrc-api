<?php

namespace LaravelHMRC;

use HMRC\Oauth2\Provider;

class LaravelHMRC
{
    /**
     * @var Provider
     */
    private $provider;

    public function __construct(string $clientId, string $clientSecret, string $callbackURI)
    {
        $this->provider = new Provider($clientId, $clientSecret, $callbackURI);
    }

    /**
     * @return Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }
}
