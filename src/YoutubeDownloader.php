<?php
namespace SimplePHPYoutubeDownloader;

use SimplePHPYoutubeDownloader\Exception\UrlMalformedException;
use SimplePHPYoutubeDownloader\Utils\Browser;

require '../vendor/autoload.php';

class YoutubeDownloader {

    private $client;

    public function __construct($url)
    {
        $this->client = new Browser();
        $html = $this->getHtmlPage($url);
        $this->getPlayerResponseAndVideoDetails($html);
    }

    public function getPlayerResponseAndVideoDetails(string $html): array {
        preg_match('/"streamingData":(?<jsonData>{.*}),"playerAds":.*"videoDetails":(?<details>{.*}),"annotations"/', stripcslashes($html), $matches);

        $videoData['data'] = json_decode($matches['jsonData'], true);
        $videoData['details'] = json_decode($matches['details'], true);

        return $videoData;
    }

    /**
     * @param $url
     * @return string|null
     * @throws UrlMalformedException
     */
    public function getHtmlPage(string $url): ?string {
        $videoId = $this->extractVideoId($url);

        return $this->client->get(sprintf('https://www.youtube.com/watch?v=%s', $videoId));
    }

    /**
     * @param $url
     * @return mixed
     * @throws UrlMalformedException
     */
    public function extractVideoId(string $url) {

        preg_match('/^https:\/\/www\.youtube\.com\/watch\?v=(.{11}).*$/', $url, $matches);

        if (count($matches) == 2) {
            return $matches[1];
        } else {
            throw new UrlMalformedException('The video I.D. couldn\'t be extracted.', 1);
        }
    }

}
