<?php


namespace SimplePHPYoutubeDownloader\Exception;


use Throwable;

class ErrorDataVideoException extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
