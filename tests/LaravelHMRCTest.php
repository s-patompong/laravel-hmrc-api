<?php

namespace LaravelHMRC\Test;

use HMRC\Oauth2\Provider;
use LaravelHMRC\LaravelHMRC;
use PHPUnit\Framework\TestCase;

class LaravelHMRCTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_initialized_and_provide_provider()
    {
        $laravelHMRC = new LaravelHMRC("client_id", "client_secret", "callback_uri");

        $this->assertInstanceOf(Provider::class, $laravelHMRC->getProvider());
    }
}
