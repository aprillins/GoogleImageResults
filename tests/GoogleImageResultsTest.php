<?php

use Aprillins\GoogleImageResults\GoogleImageResults;

/**
* 
*/
class GoogleImageResultsTest extends PHPUnit_Framework_TestCase
{
    
    function testGooleImageResultsConstruct()
    {
        $keyword = 'pedang dan golok';
        $gir = new GoogleImageResults('pedang dan golok');
        $this->assertEquals($keyword, $gir->keyword);
    }

    function testGetGoogleImageResults(){
        $gir = new GoogleImageResults('pedang dan golor');
        $jsonResponse = $gir->getGoogleImageResults();
        $this->assertJson($jsonResponse, 'Bukan JSON');
    }
}