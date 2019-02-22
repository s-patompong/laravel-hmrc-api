<?php

namespace LaravelHMRC\Test;

use HMRC\Environment\Environment;
use HMRC\ServerToken\ServerToken;
use LaravelHMRC\ServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelHMRCServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    /** @test */
    public function its_default_environment_is_sandbox()
    {
        /** @var Environment $environment */
        $environment = app(Environment::class);

        $this->assertEquals(Environment::SANDBOX, $environment->getEnv());
    }

    /** @test */
    public function it_set_server_token_from_config()
    {
        $this->assertEquals('test_server_token', ServerToken::getInstance()->get());
    }

    /** @test */
    public function it_creates_singleton_of_Environment_class()
    {
        /** @var Environment $environment */
        $environment = app(Environment::class);
        $environment->setToLive();

        /** @var Environment $anotherEnvironment */
        $anotherEnvironment = app(Environment::class);
        $this->assertEquals(Environment::LIVE, $anotherEnvironment->getEnv());
    }

    /** @test */
    public function it_creates_singleton_of_ServerToken_class()
    {
        $fakeServerToken = '12345';

        /** @var ServerToken $serverToken */
        $serverToken = app(ServerToken::class);
        $serverToken->set($fakeServerToken);

        /** @var ServerToken $anotherServerToken */
        $anotherServerToken = app(ServerToken::class);
        $this->assertEquals($fakeServerToken, $anotherServerToken->get());
    }
}
