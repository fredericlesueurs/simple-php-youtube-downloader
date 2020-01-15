<?php
namespace SimplePHPYoutubeDownloader\Utils;

use Goutte\Client;

class Crawler
{

    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getPlayerResponse(string $url): array {
        $crawler = $this->client->request('GET', $url);

        preg_match('/"streamingData":(?<jsonData>{.*}),"playerAds":.*"videoDetails":(?<details>{.*}),"annotations"/', stripcslashes($crawler->text()), $matchData);

        $jsonResponse['data'] = $matchData['jsonData'];
        $jsonResponse['details'] = $matchData['details'];

        return $jsonResponse;
    }

}
