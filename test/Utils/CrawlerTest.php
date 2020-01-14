<?php


use PHPUnit\Framework\TestCase;
use SimplePHPYoutubeDownloader\Utils\Crawler;

class CrawlerTest extends TestCase
{

    public function test_crawler() {
        $crawler = new Crawler();
        $crawler->getJsonResponsePlayer('https://www.youtube.com/watch?v=eS20eK8rDB8');
    }

}
