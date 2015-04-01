<?php namespace Aprillins\GoogleImageResults\Support;

use Illuminate\Support\ServiceProvider;
use Aprillins\GoogleImageResults\GoogleImageResults as gir;

class GoogleImageResultsServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {   
        $this->app->singleton('googleimageresults', function($app)
        {
            return new gir;
        });
    }
    
    
}