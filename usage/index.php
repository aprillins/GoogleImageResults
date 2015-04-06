<?php namespace Aprillins\GoogleImageResults\Usage;

require __DIR__.'/../vendor/autoload.php';

use Aprillins\GoogleImageResults\GoogleImageResults as theGIS;
use Aprillins\GoogleImageResults\CommonClass\QueryClass as Query;

$querydata = new Query('pedang dan golok', 0, 'large');
$gis = new theGIS($querydata);
//$gis = new theGIS('pedang dan golok');

echo '<pre>';
$imageURLs = $gis->getImageURL();
foreach($imageURLs as $imageURL){
    echo "$imageURL\n";
}
echo "\n\n\n";

$images = $gis->getResultsDetailArray();

foreach($images as $image){
    echo 'Title: '.$image['title']."\n";
    echo 'Image URL: '.$image['url']."\n";
    echo 'Height: '.$image['height']."\n";
    echo 'Width: '.$image['width']."\n";
    echo 'Website: '.$image['website']."\n\n";
}
echo '</pre>';



