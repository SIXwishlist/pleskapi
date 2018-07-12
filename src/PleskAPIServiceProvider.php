<?php

namespace Fkomaralp\PleskAPI;

use Illuminate\Support\ServiceProvider;

class PleskAPIServiceProvider extends ServiceProvider {
    public function register ()
    {
        $this->app->bind("pleskapi", function($app){
            return new PleskAPI;
        });
    }

    public function boot ()
    {
    }
}