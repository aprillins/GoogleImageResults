<?php

use Aprillins\GoogleImageResults\GoogleImageResults;

/**
* 
*/
class GoogleImageResultsTest extends PHPUnit_Framework_TestCase
{
    
    function testGoogleImageResultsConstruct()
    {
        $keyword = 'pedang dan golok';
        $gir = new GoogleImageResults('pedang dan golok');
        $this->assertEquals($keyword, $gir->keyword);
    }

    function testGetGoogleImageResults()
    {
        $gir = new GoogleImageResults('pedang dan golok');
        $this->assertJson($gir->jsonResponse, 'Bukan JSON');
    }
    
    function testGetNumberOfResults()
    {
        $gir = new GoogleImageResults('pedang dan golok');
        $this->assertInternalType("int", $gir->getNumberOfResults(), "Bukan Integer");
    }

    function testResultsDetailVariable()
    {
        $gir = new GoogleImageResults('pedang dan golok');
        $this->assertNotEmpty($gir->resultsDetail);
        $this->assertNotEmpty($gir->resultsDetail[0]);
        $this->assertNotEmpty($gir->resultsDetail[0]->titleNoFormatting);
    }

    function testImageVariables()
    {
        $gir = new GoogleImageResults('pedang dan golok');
        $this->assertNotEmpty($gir->imageURL);
        $this->assertNotEmpty($gir->imageTitle);
    }

}