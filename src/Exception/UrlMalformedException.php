<?php


namespace SimplePHPYoutubeDownloader\Exception;


use Exception;
use Throwable;

class UrlMalformedException extends Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
