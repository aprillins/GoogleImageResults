<?php namespace Aprillins\GoogleImageResults\Support;

use Illuminate\Support\Facades\Facade;

class GoogleImageResultsFacade extends Facade
{
    protected static function getFacadeAccessor(){ return 'googleimageresults'; }    
}

?>