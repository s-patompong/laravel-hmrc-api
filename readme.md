# laravel-hmrc-api
Install this library using composer require
```
composer require s-patompong/laravel-hmrc-api
```
If you use Laravel 5.5 up, it will be automatically discovered by Laravel, if now, add this code to your config/app.php file, providers array.
```
LaravelHMRC\ServiceProvider::class
```
Then, publish the config file using `php artisan vendor:publish` command. The config will be in config/hmrc.php. After that, please specify the credentials and callback in your .env file (or hmrc.php config file).
```
HMRC_LIVE_ENV=true
HMRC_CLIENT_ID=client_id
HMRC_CLIENT_SECRET=123456789
HMRC_SERVER_TOKEN=abcdefghij
HMRC_CALLBACK_URI=http://homestead.test/callback
``` 

## Dependencies injection
This library utilize Laravel dependencies injection, this way you can initialize important classes without sending client id, client secret to it. For example:
```php
<?php

namespace App\Http\Controllers;

use HMRC\Environment\Environment;
use HMRC\ServerToken\ServerToken;
use Illuminate\Http\Request;
use LaravelHMRC\LaravelHMRC;

class HMRCAPIController extends Controller
{
    private $hmrcService;

    private $environment;

    private $serverToken;

    public function __construct(LaravelHMRC $hmrcService, Environment $environment, ServerToken $serverToken)
    {
        $this->hmrcService = $hmrcService;
        $this->environment = $environment;
        $this->serverToken = $serverToken;
    }

    public function index(Request $request)
    {
        dd($this->hmrcService, $this->environment, $this->serverToken);
    }
}

``` 
