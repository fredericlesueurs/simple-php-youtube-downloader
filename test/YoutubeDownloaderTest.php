<?php


class YoutubeDownloaderTest extends \PHPUnit\Framework\TestCase
{

    public function test_create_new_instance() {
        $youtube = new \SimplePHPYoutubeDownloader\YoutubeDownloader();
        var_dump($youtube->getYoutubeVideo('https://www.youtube.com/watch?v=aR-KAldshAE'));
    }

}
