<?php namespace Aprillins\GoogleImageResults\CommonClass;

use Stringy\StaticStringy;

class StaticFunctionsClass
{
    /**
     * Get filename from URL.
     * 
     * @param  string  $url
     * @param  boolean  $extension
     * @return string $filename
     */
    public static function getFilename($url, $extension = true)
    {
        $pathInfo = pathinfo($url); 
        
        $filename = $pathInfo['filename'];
        
        if($extension == true){
            $extension = $pathInfo['extension'];
            $filename .= ".$extension";
        }

        return $filename;
    }

    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @author Taylor Otwell <taylorotwell@gmail.com>
     * @param  string  $value
     * @return string
     */
    public static function ascii($value)
    {
        return StaticStringy::toAscii($value);
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     * 
     * @author Taylor Otwell <taylorotwell@gmail.com>
     * @param  string  $title
     * @param  string  $separator
     * @return string
     */
    public static function slug($title, $separator = '-')
    {
        $title = static::ascii($title);

        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('!['.preg_quote($flip).'+]+!u', $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

        return trim($title, $separator);
    }

    
}