<?php namespace Aprillins\GoogleImageResults;

use Aprillins\GoogleImageResults\AbstractClass\AbstractImageSearchOnSearchEngine;

/**
 * GoogleImageResults main class 
 *
 * @author  aprillins the fox <aprillins@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    http://github.com/aprillins/GoogleImageResults
 */
class GoogleImageResults extends AbstractImageSearchOnSearchEngine
{
    public $keyword;
    public $queryURL;
    public $resultStart;
    public $jsonResponse;
    public $resultsDetail;

    public $imageTitle;
    public $imageURL;
    public $imageWidth;
    public $imageHeight;
    public $imageWebsiteURL;

    public $resultsDetailArray;

    /**
     * Set the keyword and fire all the needed things
     *
     * @var $keyword
     */
    function __construct($keyword)
    {
        $this->keyword = $keyword;
        $this->setQuery($keyword);
        $this->jsonResponse = $this->getGoogleImageJSONData();
        $this->setResultsDetail();
        $this->reconstructData();
    }

    /**
     * Set query/keyword to be searched
     *
     * @var $query
     */
    function setQuery($query)
    {
        $query = urlencode($query);
        $resultStart = 0;
        $url = 'https://ajax.googleapis.com/ajax/services/search/images?'.'rsz=8&q='.$query.'&v=1.0&start='.$resultStart.'&imgsz=large';
        $this->queryURL = $url;
    }

    /**
     * Get content of $this->jsonResponse['responseData']['results']
     * 
     * @return object
     */
    function setResultsDetail()
    {
        $jsonResponseToArrayObject = json_decode($this->jsonResponse, false);
        $this->resultsDetail = $jsonResponseToArrayObject->responseData->results;
    }

    /**
     * Get the raw JSON data
     * 
     * @return JSON
     */
    function getGoogleImageJSONData()
    {
        return file_get_contents($this->queryURL);
    }

    /**
     * Get the number of result from JSON data
     *
     * @return integer
     */
    function getNumberOfResults()
    {
        $jsonResponseToArrayObject = json_decode($this->jsonResponse, false);
        return count($jsonResponseToArrayObject->responseData->results);
    }


    /**
     * Reconstruct value inside $this->resultsDetail
     * to provide better data structure
     * 
     * This is the provided [properties] => value
     * from the result
     *
     * [width] => 640
     * [height] => 480
     * [imageId] => ANd9GcRjBWPzgxGQdkULVIBNe5YAVGPLcBq5wPOURzidH-ULf2xId2GVRRrLMCI
     * [tbWidth] => 137
     * [tbHeight] => 103
     * [unescapedUrl] => http://3.bp.blogspot.com/-0aWwoOmgHes/UGOnh4ope3I/AAAAAAAAAzU/c50wAuY3cys/s1600/golok+moonwolf+panjang+59cm.jpg
     * [url] => http://3.bp.blogspot.com/-0aWwoOmgHes/UGOnh4ope3I/AAAAAAAAAzU/c50wAuY3cys/s1600/golok%2Bmoonwolf%2Bpanjang%2B59cm.jpg
     * [visibleUrl] => screameolshop.blogspot.com
     * [title] => Screame Online Shop: Pedang Moon Wolf
     * [titleNoFormatting] => Screame Online Shop: Pedang Moon Wolf
     * [originalContextUrl] => http://screameolshop.blogspot.com/2012/09/pedang-moon-wolf.html
     * [content] => Pedang Moon Wolf
     * [contentNoFormatting] => Pedang Moon Wolf
     * [tbUrl] => http://t1.gstatic.com/images?q=tbn:ANd9GcRjBWPzgxGQdkULVIBNe5YAVGPLcBq5wPOURzidH-ULf2xId2GVRRrLMCI
     *
     * @return array
     */
    function reconstructData()
    {
        $numberOfResults = count($this->resultsDetail);
        $detail = $this->resultsDetail;

        for($i = 0; $i < $numberOfResults; $i++)
        {   
            $this->resultsDetailArray[] = [
                'title'  => $detail[$i]->titleNoFormatting,
                'url'    => $detail[$i]->unescapedUrl,
                'width'  => $detail[$i]->width,
                'height' => $detail[$i]->height,
                'website'=> $detail[$i]->visibleUrl
            ];

            $this->imageTitle[$i] = $detail[$i]->titleNoFormatting;
            $this->imageURL[$i] = $detail[$i]->unescapedUrl;
            $this->imageWidth[$i] = $detail[$i]->width;
            $this->imageHeight[$i] = $detail[$i]->height;
            $this->imageWebsiteURL[$i] = $detail[$i]->visibleUrl;
        } 
    }
}