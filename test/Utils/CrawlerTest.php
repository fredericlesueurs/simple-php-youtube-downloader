<?php


use PHPUnit\Framework\TestCase;
use SimplePHPYoutubeDownloader\Utils\Crawler;

class CrawlerTest extends TestCase
{

    public function test_crawler() {
        $crawler = new Crawler();
        $json = $crawler->getPlayerResponse('https://www.youtube.com/watch?v=eS20eK8rDB8');

        var_dump($json);
        $parser = new \SimplePHPYoutubeDownloader\Utils\JsonParser();
        $parser->parseJsonPlayerResponse($json);
    }

}
