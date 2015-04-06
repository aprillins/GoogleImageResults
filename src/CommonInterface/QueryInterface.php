<?php namespace Aprillins\GoogleImageResults\CommonInterface;

interface QueryInterface
{
    public function setKeyword($keyword);
    public function getKeyword();
    public function setQuery($start, $imagesize);
    public function getQuery();
}