<?php


namespace LaravelHMRC;


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
        $this->app->singleton(LaravelHMRC::class, function ($app) {
            $clientId = config('hmrc.client_id');
            $clientSecret = config('hmrc.client_secret');
            $callbackURI = config('hmrc.callback_uri');

            return new LaravelHMRC($clientId, $clientSecret, $callbackURI);
        });
    }
}
