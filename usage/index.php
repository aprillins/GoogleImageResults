<?php namespace Aprillins\GoogleImageResults\Usage;

require __DIR__.'/../vendor/autoload.php';

use Aprillins\GoogleImageResults\GoogleImageResults as theGIS;


$gis = new theGIS('pedang dan golok');

echo '<pre>';
foreach($gis->imageURL as $imageURL){
    echo "$imageURL\n";
}
echo "\n\n\n";

$images = $gis->resultsDetailArray;

foreach($images as $image){
    echo 'Title: '.$image['title']."\n";
    echo 'Image URL: '.$image['url']."\n";
    echo 'Height: '.$image['height']."\n";
    echo 'Width: '.$image['width']."\n";
    echo 'Website: '.$image['website']."\n\n";
}
echo '</pre>';