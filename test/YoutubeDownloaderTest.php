<?php


class YoutubeDownloaderTest extends \PHPUnit\Framework\TestCase
{

    public function test_create_new_instance() {
        $youtube = new \SimplePHPYoutubeDownloader\YoutubeDownloader('https://www.youtube.com/watch?v=ozf7VJf-gsU&t=7s');
    }

}
