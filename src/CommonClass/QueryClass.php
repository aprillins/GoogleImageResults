<?php namespace Aprillins\GoogleImageResults\CommonClass;

use Aprillins\GoogleImageResults\CommonInterface\QueryInterface;

class QueryClass implements QueryInterface
{
    
    private $keyword;
    private $query;

    public function __construct($keyword = '', $start = 0, $imagesize = 'large')
    {
        $this->setKeyword($keyword);
        $this->setQuery($start, $imagesize);
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function setQuery($start = 0, $imagesize = 'large')
    {
        $url = 'https://ajax.googleapis.com/ajax/services/search/images?rsz=8';
        $url .= '&q='.urlencode($this->getKeyword());
        $url .= '&start='.$start;
        $url .= '&v=1.0&&imgsz='.$imagesize;
        $this->query = $url;
    }

    public function getQuery()
    {
        return $this->query;
    }
}