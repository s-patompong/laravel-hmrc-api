<?php


namespace LaravelHMRC;


use HMRC\Environment\Environment;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/hmrc.php' => config_path('hmrc.php'),
        ]);
    }

    public function register()
    {
        $useLiveEnvironment = config('hmrc.live_env');
        if($useLiveEnvironment) {
            Environment::getInstance()->setToLive();
        } else {
            Environment::getInstance()->setToSandbox();
        }

        $this->app->singleton(LaravelHMRC::class, function ($app) {
            $clientId = config('hmrc.client_id');
            $clientSecret = config('hmrc.client_secret');
            $callbackURI = config('hmrc.callback_uri');

            return new LaravelHMRC($clientId, $clientSecret, $callbackURI);
        });

        $this->app->singleton(Environment::class, function ($app) {
            return Environment::getInstance();
        });
    }
}
