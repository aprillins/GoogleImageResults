<?php 
namespace Aprillins\GoogleImageResults\AbstractClass;

abstract class AbstractImageSearchOnSearchEngine
{
    abstract function reconstructData();
    abstract function getNumberOfResults();
    abstract function setResultsDetail();
}