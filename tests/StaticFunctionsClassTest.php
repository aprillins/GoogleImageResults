<?php

use Aprillins\GoogleImageResults\CommonClass\StaticFunctionsClass as StaticFunction;

class StaticFunctionsClassTest extends PHPUnit_Framework_TestCase
{
    function testGetFilename()
    {
        $filenamewithoutextension = StaticFunction::getFilename('http://3.bp.blogspot.com/-0aWwoOmgHes/UGOnh4ope3I/AAAAAAAAAzU/c50wAuY3cys/s1600/golok+moonwolf+panjang+59cm.jpg', false);
        
        $filenamewithextension = StaticFunction::getFilename('http://3.bp.blogspot.com/-0aWwoOmgHes/UGOnh4ope3I/AAAAAAAAAzU/c50wAuY3cys/s1600/golok+moonwolf+panjang+59cm.jpg', true);
       
        $this->assertEquals('golok+moonwolf+panjang+59cm', $filenamewithoutextension);

        $this->assertEquals('golok+moonwolf+panjang+59cm.jpg', $filenamewithextension);
    }

    function testSlug()
    {
        $filenamewithextension = StaticFunction::getFilename('golok+moonwolf+panjang+59cm.jpg', true);
       
        $sluggedfilenamewithextension = StaticFunction::slug('golok moonwolf+panjang+59cm.jpg', '-');

        $this->assertEquals('golok+moonwolf+panjang+59cm.jpg', $filenamewithextension);

        $this->assertEquals('golok-moonwolf-panjang-59cm.jpg', $sluggedfilenamewithextension);
    }

}