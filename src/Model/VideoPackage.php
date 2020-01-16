<?php


namespace SimplePHPYoutubeDownloader\Model;


class VideoPackage
{

    /**
     * @var VideoDetails
     */
    private $videoDetails;

    /**
     * @var array
     * @type SimplePHPYoutubeDownloader\Model\Video
     */
    private $videos;

    /**
     * @return VideoDetails
     */
    public function getVideoDetails(): VideoDetails
    {
        return $this->videoDetails;
    }

    /**
     * @param VideoDetails $videoDetails
     * @return VideoPackage
     */
    public function setVideoDetails(VideoDetails $videoDetails): VideoPackage
    {
        $this->videoDetails = $videoDetails;
        return $this;
    }

    /**
     * @return array
     */
    public function getVideos(): array
    {
        return $this->videos;
    }

    /**
     * @param array $videos
     * @return VideoPackage
     */
    public function setVideos(array $videos): VideoPackage
    {
        $this->videos = $videos;
        return $this;
    }

}
