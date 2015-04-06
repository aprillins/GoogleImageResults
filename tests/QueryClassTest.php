<?php 

use Aprillins\GoogleImageResults\CommonClass\QueryClass;

class testQueryClass extends PHPUnit_Framework_TestCase
{
    
    protected $qc;

    function setUp()
    {
        $this->qc = new QueryClass;
    }

    function testConstructor()
    {
        $qc = new QueryClass('pedang dan asu', 8, 'small');
        $qc->setKeyword('pedang dan asu');
        $this->assertEquals('https://ajax.googleapis.com/ajax/services/search/images?rsz=8&q='.urlencode($qc->getKeyword()).'&start=8&v=1.0&&imgsz=small', $qc->getQuery());
    }

    function testSetKeyword()
    {
        $this->qc->setKeyword('pedang dan golok');
    }

    function testGetKeyword()
    {
        $this->qc->setKeyword('pedang dan golok');
        $this->assertEquals('pedang dan golok', $this->qc->getKeyword());
    }

    function testSetQuery()
    {
        $this->qc->setQuery(0, 'large');
    }

    function testGetQuery()
    {
        $this->qc->setKeyword('pedang dan golok');
        $this->qc->setQuery(0, 'large');

        $this->assertEquals('https://ajax.googleapis.com/ajax/services/search/images?rsz=8&q='.urlencode($this->qc->getKeyword()).'&start=0&v=1.0&&imgsz=large', $this->qc->getQuery());
    }

}