<?php
namespace SimplePHPYoutubeDownloader;

use SimplePHPYoutubeDownloader\Utils\Crawler;

require '../vendor/autoload.php';

class YoutubeDownloader {

    private $url;
    private $crawler;

    public function __construct()
    {
        $this->crawler = new Crawler();
    }

}
