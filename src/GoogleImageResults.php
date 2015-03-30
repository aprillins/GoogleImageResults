<?php namespace Aprillins\GoogleImageResults;

/**
* GoogleImageResult - get the JSON data from ajax.googleapis.com
* 
* @package GoogleImageResults
* @author aprillins the fox
*/
class GoogleImageResults
{
    public $keyword;
    public $queryURL;
    public $resultStart;

    function __construct($keyword)
    {
        $this->keyword = $keyword;
        $this->setQuery($keyword);
    }

    function getGoogleImageResults(){
        $jsonResponse = $this->getGoogleAPIParams();
        return $jsonResponse;
    }

    function setQuery($query){
        $query = urlencode($query);
        $resultStart = 0;
        $url = 'https://ajax.googleapis.com/ajax/services/search/images?'.'rsz=8&q='.$query.'&v=1.0&start='.$resultStart.'&imgsz=large';
        $this->queryURL = $url;
    }

    function getGoogleAPIParams(){
        return file_get_contents($this->queryURL);
    }
}