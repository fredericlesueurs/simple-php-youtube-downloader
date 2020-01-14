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

    public function getJsonResponsePlayer(string $url): string {
        $crawler = $this->client->request('GET', $url);

        return '';
    }

}
