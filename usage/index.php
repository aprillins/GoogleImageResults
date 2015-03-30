<?php namespace Aprillins\GoogleImageResults\Usage;

require __DIR__.'/../vendor/autoload.php';

use Aprillins\GoogleImageResults\GoogleImageResults as theGIS;


$gis = new theGIS('pedang dan golok');
echo '<pre>';
echo $gis->getGoogleImageResults();
echo '</pre>';